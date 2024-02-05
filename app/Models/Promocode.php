<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Money\Currency;
use Money\Money;

class Promocode extends Model
{
    use HasFactory;

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    const TYPE_UNLIMITED = 0;
    const TYPE_LIMITED_ACTUATIONS = 1;

    const DISCOUNT_TYPE_PERCENT = 1;
    const DISCOUNT_TYPE_VALUE = 2;

    protected $fillable = [
        'code',
        'type',
        'actuations',
        'actuations_used',
        'from',
        'to',
        'discount_type',
        'discount_value',
        'status'
    ];

    public static function createFromRequest(Request $request) {
        $promocode = new self();
        $promocode->fill($request->toArray());
        $promocode->save();
    }

    public function getDiscountTypeForAdmin() {
        if ($this->discount_type == self::DISCOUNT_TYPE_PERCENT) {
            return '%';
        } else {
            return 'сума';
        }
    }

    public static function findByCode($name) {
        $code = self::where('code', $name)->first();
        return $code;
    }

    public function applyTo($price) {
        $amount = new Money($price, new Currency('UAH'));
        $newAmount = $amount->getAmount();

        // if %
        if ($this->discount_type == self::DISCOUNT_TYPE_PERCENT) {
            list($discountAmount, $whatIsLeft) = $amount->allocate([$this->discount_value, (100 - $this->discount_value)]);
            $newAmount = $whatIsLeft;
        }

        // if amount
        if ($this->discount_type == self::DISCOUNT_TYPE_VALUE) {
            $newAmount = $amount->subtract(new Money($this->discount_value, new Currency('UAH')));
        }

        return $newAmount->getAmount();
    }

    public function isUnlimited() {
        return $this->type == self::TYPE_UNLIMITED;
    }

    public function isEnabled() {
        return $this->status == self::STATUS_ENABLED;
    }

    public function hasActuations() {
        return $this->actuations > $this->actuations_used;
    }

    /**
     * @return bool
     *
     *
     * 1. checj if status is enabled/disabled
     */
    public function isActive() {
        $result = false;

        // if status is enabled
        if ($this->isEnabled()) {

            if ($this->isUnlimited()) {
                $result = true;
            } else {
                if (!$this->isUnlimited() && $this->hasActuations()) {
                    $result = true;
                }
            }

        }


        return $result;
    }

    public function isValid() {
        $result = false;

        if ($this->isActive()) {
            if ($this->isUnlimited()) {
                $result = true;
            }
        }
//        dd($result);
        // if limited &&

        return $result;
    }

}
