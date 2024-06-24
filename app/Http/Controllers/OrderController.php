<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\RaceRegistered;
use App\Models\Order;
use App\Models\Promocode;
use App\Models\Race;
use App\Models\RaceForm;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * @param Request $request
     *
     * Компанія відправляє запит на проведення платежу, з передачею параметра server_url.
     * Після обробки операції процесінгом LiqPay і отриманням кінцевого статусу, на ваш сервер буде відправлений POST
     *     запит з двома параметрами data і signature, де: data - json рядок з параметрами APIs закодований функцією
     *     base64, base64_encode( json_string ), signature - унікальний підпис кожного запиту base64_encode( sha1(
     *     private_key + data + private_key) ), base64_encode - повертає рядок, закодований методом base64, sha1 -
     *     повертається хеш у вигляді бінарного рядку з 20 символів. Для перевірки справжності запиту з сервера LiqPay
     *     необхідно:
     * - сформувати signature на стороні вашого сервера, використовуючи отриману у відповіді від LiqPay data і ваш
     *     private_key, signature=base64_encode( sha1( private_key + data + private_key) )
     * - підсумкову signature необхідно порівняти з отриманою із Callback від LiqPay,
     * - якщо signature ідентичні, значить ви отримали справжню відповідь від сервера LiqPay (незмінений третьою
     *     особою/без втручання третіх осіб) і можна виконувати зобов'язання перед клієнтом по платежу, відповідно з
     *     отриманим статусом платежу. Для отримання поточного статусу транзакції до отримання фінального в Callback,
     *     використовуйте API Статус платежу, який можна викликати в будь-який час.
     */
    public function callbackStatus(Request $request)
    {
        $private_key = config('liqpay.private_key');
        $public_key = config('liqpay.public_key');
        $sign = base64_encode(sha1($private_key . $request->data . $private_key, true));
        $req_sign = $request->signature;

        if ($sign == $req_sign) {
            $data = json_decode(base64_decode($request->data));
            $order = Order::query()->where('id', $data->order_id)->first();

            if ($order) {
                if ($data->status == 'success') {
                    $order->setPaid();

                    $order->assignNumber();

                    Promocode::findByCode($order->promocode)?->updateActivations();

                    $request->merge([
                        'name' => $order->name,
                        'race_name' => Race::query()->where('id', '=', $order->race_id)->first()->title
                    ]);

                    Mail::to($order->email)->send(new RaceRegistered($request));

                    return redirect()->to('/')->with(
                        'success',
                        'Дякуємо за реєстрацію, перевірте будь ласка пошту ' . $order->email
                    );
                }
            }
        } else {
            return redirect()->to('/')->with(
                'danger',
                'Дякуємо за реєстрацію, перевірте будь ласка пошту, вказану при реэстрації, для подальших інструкцій'
            );
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function paymentResult(Request $request): void
    {
        Log::debug('payment-result', $request->toArray());
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $orders = Order::query()->where('status', '!=', Order::STATUS_DELETED)
            ->orderBy('created_at', 'desc')
            ->orderBy('name')
            ->get()
        ;
        $ordersCount = Order::query()->where('status', '!=', Order::STATUS_DELETED)->count();
        $paidOrderCount = Order::query()->where('status', Order::STATUS_REGISTERED_PAID)->count();
        $unpaidOrderCount = Order::query()->where('status', '!=', Order::STATUS_REGISTERED_PAID)->count();

        return view('orders.index', [
            'orders' => $orders,
            'ordersCount' => $ordersCount,
            'paidOrdersCount' => $paidOrderCount,
            'unpaidOrdersCount' => $unpaidOrderCount
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('orders.create');
    }

    /**
     * @throws Exception
     */
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        Order::createFromRequest($request);

        return redirect('/orders');
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function setPaid(Order $order, Request $request): RedirectResponse
    {
        $order->setPaid();

        $this->assignNumber($order, $request);

        return redirect()->route('orders');
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function setUnpaid(Order $order, Request $request): RedirectResponse
    {
        $order->setUnpaid();

        $this->unassignNumber($order, $request);

        return redirect()->route('orders');
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function setDeleted(Order $order, Request $request): RedirectResponse
    {
        $order->setDeleted();

        return redirect()->route('orders');
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function assignNumber(Order $order, Request $request): RedirectResponse
    {
        $order->assignNumber();

        return redirect()->route('orders');
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function unassignNumber(Order $order, Request $request): RedirectResponse
    {
        $order->unassignNumber();

        return redirect()->route('orders');
    }
}
