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
        // volya-fest
        $volyaFest = new Race();
        $volyaFest->name = 'Воля FEST';
        $volyaFest->slug = Str::slug($volyaFest->name);
        $exists = Race::where('name', $volyaFest->name)->count();
        if ($exists == 0) {
            $volyaFest->save();
        }
    }
}
