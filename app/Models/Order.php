<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;
    const DEFAULT_CURRENCY = 'UAH';

    protected $fillable = ['email', 'status', 'currency', 'amount', 'transaction_id', 'notes'];

    public static function createFromRequest(Request $request) {

        // get race by name
        $race = Race::where('name', $request->race_name)->first();
        if (!$race) {
            throw new \Exception('race not found');
        }

        $order = new self();
        $order->email = $request->email;
        $order->currency = self::DEFAULT_CURRENCY;
        $order->amount = 30000;
        $order->transaction_id = '';

        $order->save();

        return $order;
    }
}
