<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'food_id',
        'name',
        'price',
        'image',
    ];

    public $timestamps = true;
}
