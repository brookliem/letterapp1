<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;

class InputAttachment extends Controller
{
    public function index()
    {
        return view('content.form-elements.forms-input-attachment');
    }
}
