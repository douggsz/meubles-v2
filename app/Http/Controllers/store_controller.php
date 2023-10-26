<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class store_controller extends Controller
{
    protected function index(){
        $local = 'pontos';
        return view('pontos', compact('local'));
    }
}
