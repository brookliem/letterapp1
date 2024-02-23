<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;
use App\Models\Templates;
use Illuminate\Http\Request;

class PrintTemplate extends Controller
{
    public function index()
    {
        $templates = Templates::all();
        return view('content.form-elements.forms-print', ['data' => $templates]);
    }

    public function print()
    {
        $templates = Templates::latest()->get()->first();
        return view('content.form-elements.forms-print', [
            'template' => $templates,
        ]);
    }
}
