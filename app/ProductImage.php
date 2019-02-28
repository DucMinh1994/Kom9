<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'productimage';
    protected $fillable = ['product_id','link'];

    // liên kết
    public function products(){
    	return $this->belongsTo('App\Product','product_id','id');
    }
}
