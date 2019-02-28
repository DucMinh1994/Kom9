<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
   	protected $table = 'value';
   	protected $fillable = ['product_id','attributes_id','value'];
   	// liên kết

   	public function products(){
   		return $this->belongsTo('App\Product','product_id','id');
   	}
   	public function attributs(){
   		return $this->belongsTo('App\Attributes','attributes_id','id');
   	}
}
