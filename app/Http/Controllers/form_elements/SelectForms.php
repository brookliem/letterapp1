<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;

class SelectForms extends Controller
{
    public function index()
    {
        return view('content.form-elements.select-forms');
    }
}
