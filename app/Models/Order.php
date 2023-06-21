<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
    // scope active()
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function calculateFullSum()
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }
    public static function changeFullSum($changeSum)
    {
        $sum = self::getFullSum() + $changeSum;
        session(['full_order_sum' => $sum]);
    }
    // нет обращения к свойствам поэтому статичная функция
    public static function getFullSum(){
       return session('full_order_sum', 0);
    }
    public static function eraseOrderSum()
    {
        session()->forget('full_order_sum');
    }

    public function saveOrder($name, $phone, $recieve_method, $address, $email){
        if($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->recieve_method = $recieve_method;
            $this->address = $address;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }

}
