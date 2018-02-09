<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslatorController extends Controller
{
    public function index()
    {
        return view('translation.index');
    }
}
