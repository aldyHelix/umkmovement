<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Kontak;
use App\Partner;
use App\Tentang;
use App\User;
use App\Jamkerja;
use Carbon\Carbon;
use Image;
use File;

class PengaturanController extends Controller
{
    public $path;
    public $dimensions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = public_path('imagesupload');
        //DEFINISIKAN DIMENSI
        $this->dimensions = ['245', '300', '500'];
    }
    public function partnerUpload(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        //JIKA FOLDERNYA BELUM ADA
        if (!File::isDirectory($this->path)) {
            //MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($this->path);
        }

        //MENGAMBIL FILE IMAGE DARI FORM
        $file = $request->file('image');
        //MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        //UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
        Image::make($file)->save($this->path . '/' . $fileName);

        //LOOPING ARRAY DIMENSI YANG DI-INGINKAN
        //YANG TELAH DIDEFINISIKAN PADA CONSTRUCTOR
        foreach ($this->dimensions as $row) {
            //MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
            $canvas = Image::canvas($row, $row);
            //RESIZE IMAGE SESUAI DIMENSI YANG ADA DIDALAM ARRAY 
            //DENGAN MEMPERTAHANKAN RATIO
            $resizeImage  = Image::make($file)->resize($row, $row, function ($constraint) {
                $constraint->aspectRatio();
            });

            //CEK JIKA FOLDERNYA BELUM ADA
            if (!File::isDirectory($this->path . '/' . $row)) {
                //MAKA BUAT FOLDER DENGAN NAMA DIMENSI
                File::makeDirectory($this->path . '/' . $row);
            }

            //MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
            $canvas->insert($resizeImage, 'center');
            //SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
            $canvas->save($this->path . '/' . $row . '/' . $fileName);
        }

        //SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
        Partner::create([
            'name' => $request->name,
            'filename' => $fileName,
            'dimension' => implode('|', $this->dimensions),
            'path' => $this->path
        ]);
        return redirect()->back()->with(['patnersuccess' => 'Gambar Telah Di-upload']);
    }
    public function partnerDestroy(Request $request)
    {
        $partner = Partner::findOrFail($request->id);
        $partner->delete();

        return redirect()->back()->with([ 'patnersuccess' => 'Data berhasil dihapus!']);
    }
    public function createKontak(Request $request){
        Kontak::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->back()->with(['kontaksuccess' => 'informasi berhasil ditambahkan!']);
    }
    public function updateKontak(Request $request)
    {
        Kontak::findOrFail($request->id)->update($request->all());
        return redirect()->back()->with(['kontaksuccess' => 'informasi berhasil diupdate!']);
    }
    public function destroyKontak(Request $request)
    {
        $kontak = Kontak::findOrFail($request->id);
        $kontak->delete();

        return redirect()->back()->with([ 'kontaksuccess' => 'Data berhasil dihapus!']);
    }
    public function updateTentang(Request $request)
    {
        Tentang::findOrFail($request->id)->update($request->all());
        return redirect()->back()->with(['tentangsuccess' => 'informasi berhasil diupdate!']);
    }
    public function index()
    {
        $tentang = Tentang::first();
        $partner = Partner::all();
        $kontak = Kontak::all();
        $jamker = Jamkerja::all();
        return view('admin/pengaturan', compact('kontak','partner','tentang','jamker','countberita'));
    }
    public function ubahPassword(Request $request)
    {
        $userpass = User::find(1)->password;
        $newpass1 = Hash::make($request->newpass1);
        $newpass2 = Hash::make($request->newpass2);
        if (Hash::check($request->password , $userpass)) {
            if (Hash::check($request->password, $newpass1)) {
                 return redirect()->back()->with(['passwordinfo' => 'password lama anda sama dengan password baru! gunakan password yang berbeda.']);
        } else {
                if ( Hash::check($request->newpass2, $newpass1)) {
                    User::findOrFail($request->id)->update([
                        'password' => $newpass1
                    ]);
                    return redirect()->back()->with(['passwordinfo' => 'password berhasil diubah!']);
                } else {
                    return redirect()->back()->with(['passwordinfo' => 'Verifikasi password baru tidak sama!']);
                }
            }
        } else {
            return redirect()->back()->with(['passwordinfo' => 'password salah!']);  
        }
        
    }
}
