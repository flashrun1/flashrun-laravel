<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    /**
     * @inheritDoc
     */
    protected $table = 'race';

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'title',
        'logo',
        'front_description',
        'race_description',
        'is_active',
        'document',
        'position'
    ];
}
