<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $table = 'races';
    protected $fillable = [
        'name', 'slug', 'type', 'distance'
    ];


    protected $static_races = [
        'volya_fest' => [
            'amount' => 300,
            'description' => 'Воля-fest'
        ]
    ];



}
