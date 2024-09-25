<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Food extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'foods';

    protected $fillable = [
        'name',
        'price',
        'category',
        'image',
        'description',
        'image',
    ];

    public $timestamps = true;


}
