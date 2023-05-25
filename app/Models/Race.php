<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    const TYPE_RELAY = 'relay';
    const TYPE_REGULAR = 'regular';
    const TYPE_KiDS = 'kids';

    protected $table = 'races';
    protected $fillable = [
        'name', 'slug', 'type', 'distance'
    ];


    protected static $static_races = [
        'volya_fest' => [
            'amount' => 300,
            'description' => 'Воля-fest'
        ]
    ];

    public function participants() {
        $participants = Order::where('race_name', $this->name)
            ->where('status', Order::STATUS_REGISTERED_PAID)
            ->orWhere('type', self::TYPE_KiDS)
            ->get()
        ;
        return $participants;
    }

    public static function getIdByName($name) {
        return self::query()->where('name', $name)->first()->id;
    }



}
