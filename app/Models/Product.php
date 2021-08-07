<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable=[
        'name',
        'description',
        'price',
        'price_sale',
        'menu_id',
        'active'
    ];
    public function menu(){
        return $this->hasOne(Menu::class,'id','menu_id')->withDefault(['name'=>'']);
    }
}
