<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceForm extends Model
{
    use HasFactory;

    /**
     * @inheritDoc
     */
    protected $table = 'race_form';

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'distance',
        'number_starts_from',
        'payments',
        'notes',
        'extra_fields',
        'race_id',
        'type_id'
    ];
}
