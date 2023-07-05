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

    public static function getIdBySlug($slug) {
        return self::query()->where('slug', $slug)->first()->id;
    }

    public static function getPriceById($id) {
        $race = self::findOrFail($id);

        if (!\Carbon\Carbon::parse('2023-07-01')->isPast()) {
            $price = 600;
        }


        if (\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2023-07-02'), \Carbon\Carbon::parse('2023-07-30'))) {
            $price = 700;
        }

        return $price;

        // before 1.07.2023 - 600uah
        // from 2.07.2023 to 30.07.2023 - 700uah
        // from 1.08.2023 to 25.08.2023 - 900uah
    }

    public static function getNameBySlug($slug) {
        return self::query()->where('slug', $slug)->first()->name;
    }


}
