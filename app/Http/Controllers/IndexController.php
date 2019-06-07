<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Kontak;
use App\Pesanmasuk;
use App\Berita;
use App\Partner;
use App\Portofolio;
use App\Service;
use App\Tentang;
use App\Visits;


class IndexController extends Controller
{
    public function index()
    {
        function getUserIpAddr()
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                //ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                //ip pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
        Visits::create([
            'ip' => getUserIpAddr(),
            //'country' => $visitor->geoIp->country_name,
        ]);

        $visitors = Visits::all()->count();
        $kontak = Kontak::all();
        $portofolio = Portofolio::limit(6)
        ->orderBy('created_at', 'desc')
        ->get();
        $berita = Berita::limit(6)
        ->orderBy('tgl_berita','desc')
        ->get();
        $partner = Partner::all();
        $tentang = Tentang::first();
        $hasilkerjaselesai = Portofolio::all()->where('is_done', 1)->count();
        $hasilkerja = Portofolio::all()->count();
        $countinbox = Pesanmasuk::all()->count();
        $service = Service::limit(6)->get();
        return view('index', compact('visitors','kontak','portofolio','berita','partner','tentang','hasilkerjaselesai','hasilkerja','countinbox','service'));
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
