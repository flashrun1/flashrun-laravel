<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KamyanecRaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $race = Race::where('name', 'Благодійний Забіг')->first();
        if (!$race) {
            $race = Race::create([
                'name' => 'Благодійний Забіг',
                'slug' => 'charity-valeriy-odaynuk'
            ]);
        }
    }
}
