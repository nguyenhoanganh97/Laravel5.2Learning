<?php

namespace App\Http\Controllers;
use App\MacStaff;

class HomeController extends Controller
{
    function index()
    {
        $macStaff =  MacStaff::all();
        return view('master',compact('macStaff'));
    }

}
?>