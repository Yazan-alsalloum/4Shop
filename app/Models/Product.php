<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function types()
    {
    	return $this->hasMany(Type::class);
    }
    public function getPriceAttribute($value)
    {
        $discount = $value*($this->discount/100);//Kortingin euro's
        $final_price =$value - $discount;//Haal korting af van prijs
        return number_format($final_price,2);//Zorg altijd voor 2 decimalen
    }
}
