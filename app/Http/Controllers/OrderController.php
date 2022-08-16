<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        /**
         * $sign = base64_encode( sha1(
         * $private_key .
         * $data .
         * $private_key
         * , 1 ));
         */
        Log::debug($request->toArray());
    }

    public function index()
    {
        $orders = Order::all();

        return view('orders.index', [
            'orders' => $orders,
        ]);
    }

    public function create()
    {
        return view('orders.create');
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request)
    {
        Order::createFromRequest($request);

        return redirect('/orders');
    }

    public function setPaid(Order $order, Request $request) {
        $order->setPaid();
        return redirect()->route('orders');
    }

    public function setDeleted(Order $order, Request $request) {
        $order->setDeleted();
        return redirect()->route('orders');
    }
}
