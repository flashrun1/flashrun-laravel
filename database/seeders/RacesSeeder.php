<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $racesNames = [
            'Воля FEST',
            'ПроскурівRUN'
        ];

        foreach ($racesNames as $racesName) {
            $r = Race::where('name', $racesName)->first();
            if (!$r) {
                $r = new Race();
                $r->name = $racesName;
                $r->slug = Str::slug($r->name);
                $r->save();
            }
        }
    }
}
