<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class customers extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'customer';
    protected $fillable = [
        'name',
        'address',
        'password',
        'email',
    ];
    public function order()
    {
        return $this -> hasMany(Order::class,'Customer_id','id');
    }
}
