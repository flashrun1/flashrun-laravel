<?php

namespace App\Http\Controllers;

use App\Mail\RaceRegistered;
use App\Models\Order;
use App\Models\Promocode;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use LiqPay;

class RaceController extends Controller
{
    public function register(Request $request)
    {
        $description = $request->race_name . ' | ' . $request->name . ' | ' . $request->email . ' | ' .
            $request->distance . 'm' . ' | ' . $request->type;

        $price = $request->price;

        // if promocode entered - apply to price
        if ($request->has('code') && !empty($request->code)) {
            $code = $request->code;
            $promocode = Promocode::findByCode($code);
            $description .= ' | promo entered: ' . $code;

            if ($promocode && $promocode->isValid()) {
                $price = $promocode->applyTo($price);
                $request->merge([
                    'amount' => $price,
                    'price' => $price
                ]);
            }
        }


        // create order with unpaid status
        $newOrder = Order::createFromRequest($request);

        if (!$newOrder->isForKids()) {
            //json_string = {"public_key":"i00000000","version":"3","action":"pay","amount":"3","currency":"UAH","description":"test","order_id":"000001"}
            $paymentRequest = [
                'public_key' => config('liqpay.public_key'),
                'version' => '3',
                'action' => 'pay',
                'amount' => $price,
                'currency' => LiqPay::CURRENCY_UAH,
                'description' => $description,
                'order_id' => $newOrder->id,
            ];

            $paymentRequestText = json_encode($paymentRequest);

            $data = base64_encode($paymentRequestText);

            //private_key + data + private_key
            $sign_string = config('liqpay.private_key')
                . $data
                . config('liqpay.private_key');

            // base64_encode( sha1( sign_string) )
            $signature = base64_encode(sha1($sign_string));

            /**
             * curl --silent -XPOST https://www.liqpay.ua/api/request --data-urlencode
             * data="eyJwdWJsaWNfa2V5IjoiaTAwMDAwMDAwIiwidmVyc2lvbiI6IjMiLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiIzIiwiY3VycmVuY3kiOiJVQUgiLCJkZXNjcmlwdGlvbiI6InRlc3QiLCJvcmRlcl9pZCI6IjAwMDAwMSJ9" --data-urlencode
             * signature="wR+UZDC4jjeL/qUOvIsofIWpZh8="
             */

            $liqpay = new LiqPay(config('liqpay.public_key'), config('liqpay.private_key'));
            $html = $liqpay->cnb_form([
                'action' => 'pay',
                'amount' => $request->price,
                'currency' => 'UAH',

                // призначення платежу
                'description' => $description,
                'order_id' => $newOrder->id,
                'version' => '3',
                'result_url' => route('callback-status'),
                'sender_last_name' => $request->name,
                'server_url' => route('callback-status'),
            ]);

//        return redirect()->to('/')->with(
//            'success',
//            'Дякуємо за реєстрацію, перевірте будь ласка пошту ' . $request->email
//        );
            // send email
            Mail::to($request->email)->send(new RaceRegistered($request));

            return $html;
        } else {
            // send email
            Mail::to($request->email)->send(new RaceRegistered($request));
            return redirect()->to('/')->with(
                'success',
                'Дякуємо за реєстрацію, перевірте будь ласка пошту ' . $request->email
            );
        }


        //Статус операції буде відправлений на server_url.

//        $ch = curl_init();

//        curl_setopt_array($ch, [
//            CURLOPT_URL => 'https://www.liqpay.ua/api/request'
//        ]);


    }

    public function participants($raceId) {
        $race = Race::findOrFail($raceId);
        $orders = $race->participants();
        return view('orders.race-participants', compact('orders'));
    }
}
