<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Delivery extends Model
{
    protected $table = 'delivery';

    protected $fillable = [
        'name', 'date', 'match', 'destiny'
    ];
}
