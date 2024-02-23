<?php

namespace App\Http\Controllers\form_layouts;

use App\Http\Controllers\Controller;
use App\Models\Senddata;
use Illuminate\Http\Request;

class FormSendData extends Controller
{
    public function index()
    {
        $senddatas = Senddata::all();
        return view('content.form-layout.forms-send-data', ['data' => $senddatas]);
    }

    public function print()
    {
        $senddatas = Senddata::all();
        return view('content.form-layout.forms-send-data', ['data' => $senddatas]);
    }
    public function create()
    {
        return view('content.form-layout.forms-send-data');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'imnumber' => 'required',
            'file' => 'required | mimes:doc,docx,pdf',
            'description' => 'required',
            'date' => 'required',
        ]);
        $data = new Senddata();
        $data->name = $request->name;
        $data->imnumber = $request->imnumber;
        $data->file = $request->file;
        $data->description = $request->description;
        $data->date = $request->date;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(storage_path('upload/user-file'), $filename);
            $data['file'] = $filename;
        }
        $data->save();
        return redirect('/')->with('success', 'Berhasil Menambahkan Data!');
    }
}
