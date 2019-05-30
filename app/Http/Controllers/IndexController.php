<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Kontak;
use App\Pesanmasuk;

class IndexController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();

        return view('index', compact('kontak'));
    }
    public function create(){
        return index();
    }
    public function kirimPesan(Request $request)
    {
         $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'nomer_tlep' => 'required',
            'pesan' => 'required'
        ]);
        
        Pesanmasuk::create( $request->all());
        
        return back()->with('success', 'Pesan Anda Telah Terkirim Kepada Kami, Silahkan tunggu respon dari kami. Kami akan merespon secepatnya.');
    }
    public function store(Request $request)
    {
        

        
    }
}
