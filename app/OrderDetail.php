<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $fillable = ['order_id','product_id','product_name','soluong'];
    // liên kết

    public function products(){
    	return $this->belongsTo('App\Product','product_id','id');
    }

    public function order(){
    	return $this->belongsTo('App\Order','order_id','id');
    }
}
