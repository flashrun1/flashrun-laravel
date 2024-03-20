<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceType extends Model
{
    use HasFactory;

    /**
     * @inheritDoc
     */
    protected $table = 'race_type';

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'type_label'
    ];
}
