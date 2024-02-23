<?php


namespace App\Http\Controllers\form_cessie;

use App\Models\KonvenCessieSebelum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputKonvenCessieSebelum extends Controller
{
    public function index()
    {
        return view('content.form-input.input-konven-cessie-sebelum');
    }

    public function create()
    {
        return view('content.form-input.input-konven-cessie-sebelum');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggaldibuat' => 'required',
            'nomorsurat' => 'required',
            'namadebitur' => 'required',
            'nomorperjanjiankredit' => 'required',
            'tanggalperjanjian' => 'required|',
            'alamatdebitur' => 'required',
            'tanggalpembukuanbank' => 'required|',
            'pokok' => 'required',
            'denda' => 'required',
            'bunga' => 'required',
            'lainlain' => 'required',
            'cpmenangani' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'tanggaltenggatwaktu' => 'required',
            'privateofficer' => 'required',
            'privatedphead' => 'required',
        ]);

        $konven_cessie_sebelums = new KonvenCessieSebelum();
        $konven_cessie_sebelums->tanggaldibuat = $request->tanggaldibuat;
        $konven_cessie_sebelums->nomorsurat = $request->nomorsurat;
        $konven_cessie_sebelums->namadebitur = $request->namadebitur;
        $konven_cessie_sebelums->nomorperjanjiankredit = $request->nomorperjanjiankredit;
        $konven_cessie_sebelums->tanggalperjanjian = $request->tanggalperjanjian;
        $konven_cessie_sebelums->alamatdebitur = $request->alamatdebitur;
        $konven_cessie_sebelums->tanggalpembukuanbank = $request->tanggalpembukuanbank;
        $konven_cessie_sebelums->pokok = $request->pokok;
        $konven_cessie_sebelums->denda = $request->denda;
        $konven_cessie_sebelums->bunga = $request->bunga;
        $konven_cessie_sebelums->lainlain = $request->lainlain;
        $konven_cessie_sebelums->cpmenangani = $request->cpmenangani;
        $konven_cessie_sebelums->email = $request->email;
        $konven_cessie_sebelums->phone = $request->phone;
        $konven_cessie_sebelums->tanggaltenggatwaktu = $request->tanggaltenggatwaktu;
        $konven_cessie_sebelums->privateofficer = $request->privateofficer;
        $konven_cessie_sebelums->privatedphead = $request->privatedphead;
        if ($konven_cessie_sebelums->save())
            return redirect(('/'))->with('success', 'Input data successfully!');
    }
}
