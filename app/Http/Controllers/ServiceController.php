<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('admin/service',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Service::create([
            'nama_service' => $request->nama_layanan,
            'tagline' => $request->tag_line,
            'range_1' => $request->range_1,
            'range_2' => $request->range_2,
            'fitur_1' => $request->fitur_1,
            'fitur_2' => $request->fitur_2,
            'fitur_3' => $request->fitur_3,
            'fitur_4' => $request->fitur_4,
            'fitur_5' => $request->fitur_5,
            'persentase' => $request->persentase,
            'deskripsi' => $request->deskripsi,
            'logo_name' => $request->logo_name
        ]);
        return redirect()->back()->with(['success' => 'informasi berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, $id)
    {
        $service = Service::find($id);
        return view('admin/serviceinfo', compact('service'))->renderSections()['content'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Service::findOrFail($request->id)->update([
            'nama_service' => $request->nama_layanan,
            'tagline' => $request->tag_line,
            'range_1' => $request->range_1,
            'range_2' => $request->range_2,
            'fitur_1' => $request->fitur_1,
            'fitur_2' => $request->fitur_2,
            'fitur_3' => $request->fitur_3,
            'fitur_4' => $request->fitur_4,
            'fitur_5' => $request->fitur_5,
            'persentase' => $request->persentase,
            'deskripsi' => $request->deskripsi,
            'logo_name' => $request->logo_name
        ]);
        return redirect()->back()->with(['success' => 'informasi berhasil update!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Service::findOrFail($request->id)->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
