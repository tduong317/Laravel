<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'Order';

    use HasFactory;
    protected $fillable = ['Customer_id', 'Name', 'Email', 'Address', 'Status', 'token'];

    public function detail()
    {
        return $this->hasMany(Order_detail::class, 'Order_id', 'id');
    }
    public function tongtien()
    {
        $tongtien = 0;

        foreach ($this->detail as $item) {
            $tongtien += $item->quantity * $item->Price;
        }
        return $tongtien;
    }
}
