<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class client_controller extends Controller
{
    protected function index(){
        $local = 'clientes';
        return view('clientes', compact('local'));
    }
}
