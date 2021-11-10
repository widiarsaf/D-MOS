<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guessController extends Controller
{
    public function scan()
    {
        return view('qrcode.scan');
    }
}
