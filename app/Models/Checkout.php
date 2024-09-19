<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Checkout extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'checkout';

    protected $fillable = [
        'name',
        'email',
        'town',
        'country',
        'zipcode',
        'phone',
        'address',
        'user_id',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public $timestamps = true;
}
