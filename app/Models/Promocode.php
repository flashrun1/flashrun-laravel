<?php

declare(strict_types=1);

namespace App\Models;

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

    /**
     * @inheritDoc
     */
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

    /**
     * @param Request $request
     * @return void
     */
    public static function createFromRequest(Request $request): void
    {
        $promocode = new self();
        $promocode->fill($request->toArray());
        $promocode->save();
    }

    /**
     * @return string
     */
    public function getDiscountTypeForAdmin(): string
    {
        if ($this->discount_type == self::DISCOUNT_TYPE_PERCENT) {
            return ' %';
        } else {
            return ' грн';
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function findByCode($name): mixed
    {
        return self::where('code', $name)->first();
    }

    /**
     * @param $price
     * @return string
     */
    public function applyTo($price): string
    {
        $amount = new Money($price, new Currency('UAH'));

        $newAmount = match ($this->discount_type) {
            self::DISCOUNT_TYPE_PERCENT => new Money($price - ($price / 100) * $this->discount_value, new Currency('UAH')),
            self::DISCOUNT_TYPE_VALUE => $amount->subtract(new Money($this->discount_value, new Currency('UAH'))),
            'default' => $amount
        };

        return $newAmount->getAmount();
    }

    /**
     * @return bool
     */
    public function isUnlimited(): bool
    {
        return $this->type == self::TYPE_UNLIMITED;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->status == self::STATUS_ENABLED;
    }

    /**
     * @return bool
     */
    public function hasActuations(): bool
    {
        return $this->actuations > $this->actuations_used;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        $result = false;

        if ($this->isEnabled() && ($this->isUnlimited() || !$this->isUnlimited() && $this->hasActuations())) {
            $result = true;
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isActive();
    }

    /**
     * @return bool
     */
    public function updateActivations(): bool
    {
        return $this->update(['actuations_used', ++$this->actuations_used]);
    }
}
