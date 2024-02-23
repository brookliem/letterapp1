<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;

class InputData extends Controller
{
    public function index()
    {
        return view('content.form-elements.input-data');
    }
}
