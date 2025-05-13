<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_name',
        'post_title',
        'number_of_tickets',
        'amount',
    ];
}
