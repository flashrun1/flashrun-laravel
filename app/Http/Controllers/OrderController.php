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
        $private_key = config('liqpay.private_key');
        $public_key = config('liqpay.public_key');
        $sign = base64_encode( sha1($private_key . $request->data . $private_key, 1));
        $req_sign = $request->signature;

        if ($sign == $req_sign) {
            $data = json_decode(base64_decode($request->data));
            $order = Order::where('id', $data->order_id)->first();
            if ($order) {
                if ($data->status == 'success') {
                    $order->setPaid();
                    $order->save();

                    // send sms
                    $this->sendSms(null, $order->phone);

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
        //dd($sign,$request->toArray(),$req_sign);
        //Log::debug($request->toArray());
    }

    public function paymentResult(Request $request) {
        Log::debug('payment-result');
        Log::debug($request);
    }

    public function index()
    {
        $orders = Order::where('status', '!=', \App\Models\Order::STATUS_DELETED)
            ->orderBy('created_at', 'desc')
            ->orderBy('name')
            ->get()
        ;
        $ordersCount = Order::where('status', '!=', Order::STATUS_DELETED)->count();
        $paidOrderCount = Order::where('status', Order::STATUS_REGISTERED_PAID)->count();
        $unpaidOrderCount = Order::where('status', '!=', Order::STATUS_REGISTERED_PAID)->count();

        return view('orders.index', [
            'orders' => $orders,
            'ordersCount' => $ordersCount,
            'paidOrdersCount' => $paidOrderCount,
            'unpaidOrdersCount' => $unpaidOrderCount
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

    public function setUnpaid(Order $order, Request $request) {
        $order->setUnpaid();
        return redirect()->route('orders');
    }

    public function setDeleted(Order $order, Request $request) {
        $order->setDeleted();
        return redirect()->route('orders');
    }

    public function sendSms($text = null, $number) {
        $service_plan_id = "5fbb5faf86f54f95907a5a0aacc50c48";
        $bearer_token = "d070eb326b90474dab78483cf0ee434e";

        if ($text == null) {
            $text = 'Вітаємо з реєстрацією! (flashrun)';
        }

//Any phone number assigned to your API
        $send_from = "+380976534373";
//May be several, separate with a comma ,
        $recipient_phone_numbers = $number;
        $message = "$text";

// Check recipient_phone_numbers for multiple numbers and make it an array.
        if(stristr($recipient_phone_numbers, ',')){
            $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
        }else{
            $recipient_phone_numbers = [$recipient_phone_numbers];
        }

// Set necessary fields to be JSON encoded
        $content = [
            'to' => array_values($recipient_phone_numbers),
            'from' => $send_from,
            'body' => $message
        ];

        $data = json_encode($content);

        $ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
        curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, $bearer_token);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);

        if(curl_errno($ch)) {
            Log::debug('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
    }
}
