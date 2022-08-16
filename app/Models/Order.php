<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;
    const DEFAULT_CURRENCY = 'UAH';
    const STATUS_REGISTERED_NOT_PAID = 0;
    const STATUS_REGISTERED_PAYMENT_PENDING = 1;
    const STATUS_REGISTERED_PAID = 2;
    const STATUS_DELETED = 3;

    protected $fillable = ['email', 'status', 'currency', 'amount', 'transaction_id', 'notes', 'type', 'club'];

    public static function createFromRequest(Request $request) {

        // get race by name
        $race = Race::where('name', $request->race_name)->first();
        if (!$race) {
            throw new \Exception('race not found');
        }

        $order = new self();
        $order->email = $request->email;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->distance = $request->distance;
        $order->race_name = $request->race_name;
        $order->type = $request->type;
        $order->club = $request->club;
        $order->currency = self::DEFAULT_CURRENCY;
        $order->amount = 400;
        $order->transaction_id = '';

        $order->save();

        return $order;
    }

    public function getStatus() {
        $status = '';
        if ($this->status == self::STATUS_REGISTERED_NOT_PAID) {
            $status = 'не оплочено';
        }
        return $status;
    }

    public function isNotPaid() {
        return $this->status === self::STATUS_REGISTERED_NOT_PAID;
    }

    public function isPaid() {
        return $this->status == self::STATUS_REGISTERED_PAID;
    }

    public function setPaid() {
        $this->status = self::STATUS_REGISTERED_PAID;
        $this->save();
        return $this;
    }

    public function setUnpaid() {
        $this->status = self::STATUS_REGISTERED_NOT_PAID;
        $this->save();
        return $this;
    }

    public function setDeleted() {
        $this->status = self::STATUS_DELETED;
        $this->save();
        return $this;
    }

    public function isDeleted() {
        return $this->status === self::STATUS_DELETED;
    }
}
