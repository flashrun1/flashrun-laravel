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

    protected $fillable = ['email', 'status', 'currency', 'amount', 'transaction_id', 'notes', 'type', 'club', 'city'];

    public static function createFromRequest(Request $request) {

        // get race by name
        $race = Race::findOrFail($request->race_id);
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
        $order->amount = $request->price;
        $order->transaction_id = '';
        $order->promocode = $request->promocode;
        $order->city = $request->city;
        $order->race_id = $request->race_id;

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

    public function displayTypeForParticipantsList() {
        if ($this->type == Race::TYPE_RELAY) {
            return 'Естафета';
        } elseif($this->type == Race::TYPE_REGULAR) {
            return 'Звичайний забіг';
        } else if($this->type == Race::TYPE_KIDS) {
            return 'Дитячий забіг';
        } else if ($this->type == Race::TYPE_OCR) {
            return 'Забіг з перешкодами';
        } else if ($this->type == Race::TYPE_CROSSFIT_BEGINNERS) {
            return 'Кросфіт-аматори';
        } else if ($this->type == Race::TYPE_CROSS_DUATHLON) {
            return 'Крос-Дуатлон';
        } else {
            return '';
        }
    }

    public function isForKids() {
        return $this->type == 'kids';
    }

    public function getRaceNameForParticipantsList() {
        $name = '';
        $addDistance = true;
        if ($this->type == Race::TYPE_KIDS) {
            $name .= 'Дитячий забіг: ';
        }
        if ($this->type == Race::TYPE_RELAY) {
            $name .= 'Естафета';
        }
        if ($this->type == Race::TYPE_REGULAR) {
            $name .= 'Дистанція: ';
        }

        if ($this->type == Race::TYPE_CROSS_DUATHLON) {
            $name .= 'Суперспринт';
            $addDistance = false;
        }

        if ($this->type == Race::TYPE_CROSSFIT_BEGINNERS) {
            $name .= 'Кросфіт-аматори';
            $addDistance = false;
        }

        if ($addDistance) {
            if ($this->distance >= 1000) {
                $name .= $this->distance / 1000 . 'km';
            } else {
                $name .= $this->distance . 'm';
            }
        }

        return $name;

    }

    public function formatDistance() {
        $res = '';
        if ($this->distance > 0) {
            if ($this->distance >= 1000) $res = $this->distance/1000 . 'km';
            if ($this->distance < 1000) $res = $this->distance . 'm';
            //$res = $this->distance;
        }

        return $res;
    }
}
