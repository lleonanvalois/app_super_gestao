<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testeController extends Controller
{
    public function teste() {
        return view ('site.teste');
    }
}
