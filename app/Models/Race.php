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
    const TYPE_CROSS_DUATHLON = 'cross-duathlon';
    const TYPE_CROSSFIT_BEGINNERS = 'crossfit-beginners';
    const TYPE_OCR = 'ocr';
    const TYPE_SCANDI_WALK = 'scandi-walk';

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
        $participants = Order::where('race_id', $this->id)
            ->where('status', Order::STATUS_REGISTERED_PAID)
//            ->whereIn('type', [
//                self::TYPE_OCR,
//                self::TYPE_KIDS,
//                self::TYPE_CROSS_DUATHLON,
//                self::TYPE_REGULAR,
//                self::TYPE_CROSSFIT_BEGINNERS
//            ])
            //->where('status', '!=', Order::STATUS_DELETED)
//            ->where('status', Order::STATUS_REGISTERED_PAID)
//            ->whereIn('type', [self::TYPE_KIDS, self::TYPE_CROSSFIT_BEGINNERS, self::TYPE_REGULAR, self::TYPE_OCR])
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

    public static function getPriceById($id, $team = false) {
        $race = self::findOrFail($id);

        if ($race['slug'] === 'freedom-fest-2024-online') {
            $price = 400;
        } else {
            $price = 800;
        }

        if ($team === true) {
            $price = 4000;
        }

//        if (!\Carbon\Carbon::parse('2024-03-15')->isPast()) {
//            dd('tytyty');
//            $price = 800;
//            if ($team === true) {
//                $price = 4000;
//            }
//        }
//
//
//        if (\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-03-16'), \Carbon\Carbon::parse('2024-03-16'))) {
//            $price = 900;
//            if ($team === true) {
//                $price = 4500;
//            }
//        }
//
//        if (\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-04-01'), \Carbon\Carbon::parse('2024-04-19'))) {
//            $price = 1000;
//            if ($team === true) {
//                $price = 5000;
//            }
//        }
//
//        if (\Carbon\Carbon::now()->isPast(\Carbon\Carbon::parse('2024-04-21')) || \Carbon\Carbon::parse('2024-04-21')->isToday()) {
//            $price = 1200;
//            if ($team === true) {
//                $price = 6000;
//            }
//        }

        return $price;

        // before 1.07.2023 - 600uah
        // from 2.07.2023 to 30.07.2023 - 700uah
        // from 1.08.2023 to 25.08.2023 - 900uah
    }

    public static function getNameBySlug($slug) {
        return self::query()->where('slug', $slug)->first()->name;
    }

    public static function getFormattedRaceNameForParticipantsList($raceType) {

        $name = '';
        $addDistance = true;
        if ($raceType == Race::TYPE_KIDS) {
            $name .= 'Дитячий забіг: ';
        }
        if ($raceType == Race::TYPE_RELAY) {
            $name .= 'Естафета';
        }
        if ($raceType == Race::TYPE_REGULAR) {
            $name .= 'Дистанція: ';
        }

        if ($raceType == Race::TYPE_CROSS_DUATHLON) {
            $name .= 'Суперспринт';
            $addDistance = false;
        }

        if ($raceType == Race::TYPE_CROSSFIT_BEGINNERS) {
            $name .= 'Кросфіт-аматори';
            $addDistance = false;
        }

//        if ($addDistance) {
//            if ($this->distance >= 1000) {
//                $name .= $this->distance / 1000 . 'km';
//            } else {
//                $name .= $this->distance . 'm';
//            }
//        }

        return $name;
    }


}
