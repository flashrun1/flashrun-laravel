<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use LiqPay;
use Termwind\Components\Li;

class RaceController extends Controller
{
    public function register(Request $request) {

        $description = $request->race_name . ' | ' . $request->name . ' | ' . $request->email . ' | ' . $request->distance . 'm';
        // create order with unpaid status
        $newOrder = Order::createFromRequest($request);

        //json_string = {"public_key":"i00000000","version":"3","action":"pay","amount":"3","currency":"UAH","description":"test","order_id":"000001"}
        $paymentRequest = [
            'public_key' => config('liqpay.public_key'),
            'version' => '3',
            'action' => 'pay',
            'amount' => '300',
            'currency' => LiqPay::CURRENCY_UAH,
            'description' => $description,
            'order_id' => $newOrder->id
        ];

        $paymentRequestText = json_encode($paymentRequest);

        $data = base64_encode($paymentRequestText);

        //private_key + data + private_key
        $sign_string = config('liqpay.private_key')
            .$data
            .config('liqpay.private_key');

        // base64_encode( sha1( sign_string) )
        $signature = base64_encode(sha1( $sign_string));

        /**
         * curl --silent -XPOST https://www.liqpay.ua/api/request --data-urlencode
        data="eyJwdWJsaWNfa2V5IjoiaTAwMDAwMDAwIiwidmVyc2lvbiI6IjMiLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiIzIiwiY3VycmVuY3kiOiJVQUgiLCJkZXNjcmlwdGlvbiI6InRlc3QiLCJvcmRlcl9pZCI6IjAwMDAwMSJ9" --data-urlencode
        signature="wR+UZDC4jjeL/qUOvIsofIWpZh8="
         */

        $liqpay = new LiqPay(config('liqpay.public_key'), config('liqpay.private_key'));
        $html = $liqpay->cnb_form(array(
            'action'         => 'pay',
            'amount'         => '400',
            'currency'       => 'UAH',

            // призначення платежу
            'description'    => $description,
            'order_id'       => $newOrder->id,
            'version'        => '3',
            'result_url'     => env('APP_URL'),
            'sender_last_name' => $request->name,
            'server_url' => route('callback-status')
        ));

        return $html;


        //Статус операції буде відправлений на server_url.

//        $ch = curl_init();

//        curl_setopt_array($ch, [
//            CURLOPT_URL => 'https://www.liqpay.ua/api/request'
//        ]);



    }
}
