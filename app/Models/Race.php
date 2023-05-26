<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    const TYPE_RELAY = 'relay';
    const TYPE_REGULAR = 'regular';
    const TYPE_KIDS = 'kids';

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
            ->where(function($q){
                $q->where('status', Order::STATUS_REGISTERED_PAID);
                $q->orWhere('type', self::TYPE_KIDS);
            })
            ->orderBy('type')
            ->orderBy('distance')
            ->orderBy('name')
            ->get()
        ;
        return $participants;
    }

    public static function getIdByName($name) {
        return self::query()->where('name', $name)->first()->id;
    }



}
