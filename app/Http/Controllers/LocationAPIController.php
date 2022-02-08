<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationAPIController extends Controller
{
    public function index(){

        $mod = \App\Models\User::all();
        dd($mod);
    }
        
    
}
