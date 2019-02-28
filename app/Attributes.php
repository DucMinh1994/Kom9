<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    public function product(){
    	return $this->belongsToMany('App\Attributes','value','product_id','attributes_id');
    }
}
