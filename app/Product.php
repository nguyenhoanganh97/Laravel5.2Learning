<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['id','name', 'price', 'cate_id'];
    public $timestamps = false;
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
}
?>