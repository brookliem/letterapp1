<?php

namespace App\Http\Controllers\SignColumn;

use App\Http\Controllers\Controller;
use App\Models\Templates;
use Illuminate\Http\Request;

class SignColumn extends Controller
{
    public function index()
    {
        return view('content.sign-column.sign');
    }
    public function create()
    {
        return view('content.sign-column.sign');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tandatangan' => 'required',
        ]);

        $templates = new Templates;
        $templates->tandatangan = $request->tandatangan;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(storage_path('upload/user-sign'), $filename);
            $data['image'] = $filename;
        }
        if ($templates->save())
            return redirect(('/print'))->with('success', 'Input data successfully!');
    }
}
