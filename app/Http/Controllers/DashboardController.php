<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pesanmasuk;
use App\Berita;
use App\Portofolio;
use App\Partner;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $countberita = Berita::all()->count();
        $hasilkerjaselesai = Portofolio::all()->where('is_done', 1)->count();
        $hasilkerjatotal = Portofolio::all()->count();
        $hasilkerja = (($hasilkerjaselesai / $hasilkerjatotal)*100);
        $countpartner = Partner::all()->count();
        $pesan = Pesanmasuk::orderBy('waktu_masuk', 'desc')->paginate(10);
        return view('admin/dashboard', compact('pesan','countberita','hasilkerja','countpartner'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Pesanmasuk::findOrFail($request->id)->delete();

        return redirect()->back()->with(['success' => 'Pesan berhasil dihapus!']);
    }
}
