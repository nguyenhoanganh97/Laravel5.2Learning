<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'status', 'description','avatar'];
    public $timestamps = false;

}
