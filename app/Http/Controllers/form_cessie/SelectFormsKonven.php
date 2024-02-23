<?php

namespace App\Http\Controllers\form_cessie;

use App\Http\Controllers\Controller;

class SelectFormsKonven extends Controller
{
    public function index()
    {
        return view('content.form-input.select-konven-cessie');
    }
}
