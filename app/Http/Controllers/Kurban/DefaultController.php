<?php

namespace App\Http\Controllers\Kurban;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    //
    public function index()
    {
        return view('default.index');
    }
}