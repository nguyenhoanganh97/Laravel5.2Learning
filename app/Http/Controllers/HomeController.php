<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    function loadHome()
    { 
        return view('home');
    }
}
?>