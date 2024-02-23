<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;
use App\Models\Templates2;
use Illuminate\Http\Request;

class FormInputTemplate2 extends Controller
{
    public function index()
    {
        return view('content.form-elements.forms-input-template2');
    }

    public function print()
    {
        //$templates2s = Templates2::latest()->get()->first();
        return view('content.form-elements.forms-print2');
    }

    public function create()
    {
        return view('content.form-elements.forms-input-template2');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'lampiran' => 'required',
            'perihal' => 'required',
            'kepada' => 'required',
            'deskripsi' => 'required',
            'namabarang' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
            'dibuatoleh' => 'required',
            'diperiksaoleh' => 'required',
            'diketahuioleh' => 'required',
            'disetujuioleh' => 'nullable',
            'posisi1' => 'required',
            'posisi2' => 'required',
            'posisi3' => 'required',
        ]);

        $templates2s = new Templates2();
        $templates2s->date = $request->date;
        $templates2s->imnumber = $this->generateCode();
        $templates2s->lampiran = $request->lampiran;
        $templates2s->perihal = $request->perihal;
        $templates2s->kepada = $request->kepada;
        $templates2s->deskripsi = $request->deskripsi;
        $templates2s->namabarang = $request->namabarang;
        $templates2s->jumlah = $request->jumlah;
        $templates2s->satuan = $request->satuan;
        $templates2s->keterangan = $request->keterangan;
        $templates2s->dibuatoleh = $request->dibuatoleh;
        $templates2s->diperiksaoleh = $request->diperiksaoleh;
        $templates2s->diketahuioleh = $request->diketahuioleh;
        $templates2s->disetujuioleh = $request->disetujuioleh;
        $templates2s->posisi1 = $request->posisi1;
        $templates2s->posisi2 = $request->posisi2;
        $templates2s->posisi3 = $request->posisi3;
        if ($templates2s->save())
            return redirect(('/print2'))->with('success', 'Input data successfully!');
    }

    public function generateCode()
    {
        $currentNumber = 1;

        // Get the last used number from the database
        $lastTemplate = Templates2::latest()->first();

        if ($lastTemplate) {
            $currentNumber = (explode('/', $lastTemplate->imnumber)[0] + 1) ?? 1;
        }

        // Get the current year
        $currentYear = date('Y');

        // Generate the code
        $code = "{$currentNumber}/CMI-IT-JKT/IM/VI/{$currentYear}";

        return $code;
    }
}
