<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['Ma_sp','name','price','description','slug','category_id','price_sale'];

    // liên kết
    public function attributes(){
     	return $this->belongsToMany('App\Attributes','value','product_id','attributes_id')->withPivot('value');
    }
    public function productImage(){
    	return $this->hasMany('App\ProductImage');
    }
    public function orderDetail(){
    	return $this->hasMany('App\OrderDetail');
    }

}
