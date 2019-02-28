<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['code','name','email','mobile','address','status','user_id','total','note','money_ship'];
    // liên kết

    public function orderdetail(){
    	return $this->hasMany('App\OrderDetail');
    }
    public function users(){
    	return $this->belongsTo('App\User','user_id','id');
    }
}
