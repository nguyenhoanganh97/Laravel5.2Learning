<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MacStaff extends Model
{
    protected $table = 'mac_staff';
    protected $primaryKey = 'id';
    protected $fillable = ['id','mac_id', 'ip', 'fist_login','last_login', 'date_check', 'data_full','location'];
    public $timestamps = false; 
}
