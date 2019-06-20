<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'category_id', 'price'];
    public $timestamps = false;

    public function Category (){
        return $this->belongsTo('App\Category');
    }
}
