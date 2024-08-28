<?php

namespace App\Cart;

class Cart
{
    public $items = [];
    public $tongsl = 0;
    public $tongtien = 0;

    public function __construct()
        {
        $this -> items = session('cart')? session('cart'):[];
        $this -> tongsl = $this -> Tinhtongsl();
        $this -> tongtien = $this -> Tinhtongtien();
    }
    public function Add($sp,$sl)
    {
        $id = $sp -> Product_id;
        if (isset($this->items[$id]))
        {
            $this->items[$id] -> Soluong += 1;
        }
        else
        {   
            $items = [
                'Product_id' => $id,
                'Tensp' => $sp -> Product_name,
                'Gia' => $sp -> Price,
                'Soluong' => $sl,
                'Anh' => $sp -> Images
            ];
            $this -> items[$id] = (object) $items;
        }
        session(['cart' => $this -> items]);
    }
    public function Delete($id)
    {
        if (isset($this -> items[$id]))
        {
            unset($this -> items[$id]);
            session(['cart' => $this -> items]);
        }
    }
    public function Clear()
    {
        session(['cart' => null]);
    }
    public function Update($id , $sl)
    {
        if (isset($this -> items[$id]))
        {
            $this -> items[$id] -> Soluong = $sl;
            session(['cart' => $this -> items]);
        }
    }
    private function Tinhtongsl()
    {
        $Tong = 0;
        foreach ($this -> items as $item)
        {
            $Tong += $item -> Soluong;
        }
        return $Tong;
    }
    private function Tinhtongtien()
    {
        $Tong = 0;
        foreach ($this -> items as $item)
        {
            $Tong += ($item -> Soluong * $item -> Gia);
        }
        return $Tong;
    }

}
