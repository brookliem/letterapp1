<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;
use App\Models\DataBarang;
use Illuminate\Http\Request;

class InputBarang extends Controller
{
    public function index()
    {
        return view('content.form-elements.forms-input-barang');
    }

    public function create()
    {
        return view('content.form-elements.forms-input-barang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namabarang' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
        ]);

        $templates = new DataBarang();
        $templates->namabarang = $request->namabarang;
        $templates->jumlah = $request->jumlah;
        $templates->satuan = $request->satuan;
        $templates->keterangan = $request->keterangan;

        if ($templates->save()) {
            // Handle success (if needed)
            return redirect('/success'); // Replace with the appropriate redirect URL
        } else {
            // Handle failure (if needed)
            return redirect('/failure'); // Replace with the appropriate redirect URL
        }
    }
}
