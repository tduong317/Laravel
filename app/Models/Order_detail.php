<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'Order_detail';
    use HasFactory;
    protected $fillable = [
        'Order_id',
        'Product_id',
        'quantity',
        'Price'
    ];
    public $timestamps = false;
    public function product()
    {
        return $this->hasOne(product::class, 'Product_id', 'Product_id');
    }

}
