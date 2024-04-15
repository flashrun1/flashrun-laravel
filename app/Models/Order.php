<?php

declare(strict_types=1);

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @property int $status
 */
class Order extends Model
{
    use HasFactory;

    const DEFAULT_CURRENCY = 'UAH';
    const STATUS_REGISTERED_NOT_PAID = 0;
    const STATUS_REGISTERED_PAYMENT_PENDING = 1;
    const STATUS_REGISTERED_PAID = 2;
    const STATUS_DELETED = 3;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'email',
        'status',
        'currency',
        'amount',
        'transaction_id',
        'notes',
        'name',
        'phone',
        'distance',
        'city',
        'club',
        'promocode',
        'number',
        'race_id',
        'type_id'
    ];

    /**
     * @param Request $request
     * @return self
     * @throws Exception
     */
    public static function createFromRequest(Request $request): Order
    {
        $order = new self();
        $request->merge(['currency' => self::DEFAULT_CURRENCY, 'transaction_id' => '', 'amount' => $request->price]);
        $order->fill($request->toArray())->save();

        return $order;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        $status = '';

        if ($this->status == self::STATUS_REGISTERED_NOT_PAID) {
            $status = 'не оплочено';
        }

        return $status;
    }

    /**
     * @return bool
     */
    public function isNotPaid(): bool
    {
        return $this->status === self::STATUS_REGISTERED_NOT_PAID;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->status == self::STATUS_REGISTERED_PAID;
    }

    /**
     * @return $this
     */
    public function setPaid(): static
    {
        $this->status = self::STATUS_REGISTERED_PAID;
        $this->save();

        return $this;
    }

    /**
     * @return $this
     */
    public function setUnpaid(): static
    {
        $this->status = self::STATUS_REGISTERED_NOT_PAID;
        $this->save();

        return $this;
    }

    /**
     * @return $this
     */
    public function setDeleted(): static
    {
        $this->status = self::STATUS_DELETED;
        $this->save();

        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->status === self::STATUS_DELETED;
    }

    /**
     * @return void
     */
    public function assignNumber(): void
    {
        $previousOrder = $this->query()->where('race_id', '=', $this->race_id)
            ->where('type_id', '=', $this->type_id)
            ->where('distance', '=', $this->distance)
            ->where('id', '!=', $this->id)
            ->where('number', '!=', null)
            ->orderBy('id', 'desc')
            ->first();

        if ($previousOrder) {
            $this->query()->where('id', '=', $this->id)->first()
                ->update(['number' => ++$previousOrder->number]);
        } else {
            $raceForm = RaceForm::query()->where('race_id', '=', $this->race_id)
                ->where('type_id', '=', $this->type_id)
                ->first();
            $numbers = array_combine(
                explode(';', json_decode($raceForm->distance, true)['distance']),
                explode(';', json_decode($raceForm->number_starts_from, true)['number_starts_from'])
            );
            $this->query()->where('id', '=', $this->id)->first()
                ->update(['number' => $numbers[$this->distance]]);
        }
    }
}
