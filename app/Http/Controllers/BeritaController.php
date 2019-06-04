<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use Carbon\Carbon;
use Image;
use File;

class BeritaController extends Controller
{
    public $path;
    public $dimensions;
    public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = public_path('imagesupload/berita');
        //DEFINISIKAN DIMENSI
        $this->dimensions = ['245', '300', '500'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        return view('admin/berita', compact('berita'));
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
        //JIKA FOLDERNYA BELUM ADA
        //SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
        //'nama_berita', 'isi_berita', 'tgl_berita', 'foto_filename', 'foto_dimension', 'foto_path'
        if(!empty($request->image)){
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);

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

            Berita::create([
                'nama_berita' => $request->nama_berita,
                'isi_berita' => $request->isi_berita,
                'tgl_berita' => $request->tgl_berita,
                'foto_filename' => $fileName,
                'foto_dimension' => implode('|', $this->dimensions),
                'foto_path' => $this->path
            ]);
            return redirect()->back()->with(['success' => 'Data telah ditambahkan dan gambar berhasil diupload!']);
        } else {
            Berita::create([
                'nama_berita' => $request->nama_berita,
                'isi_berita' => $request->isi_berita,
                'tgl_berita' => $request->tgl_berita
            ]);
            return redirect()->back()->with(['success' => 'Data telah ditambahkan !']);
        }
        
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
    public function update(Request $request)
    {
        if (!empty($request->image)) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);

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
            Berita::findOrFail($request->id)->update([
                'nama_berita' => $request->nama_berita,
                'isi_berita' => $request->isi_berita,
                'tgl_berita' => $request->tgl_berita,
                'foto_filename' => $fileName,
                'foto_dimension' => implode('|', $this->dimensions),
                'foto_path' => $this->path
            ]);
            return redirect()->back()->with(['success' => 'Data diperbarui dan Gambar Telah diperbarui']);
        } else {
            Berita::findOrFail($request->id)->update([
                'nama_berita' => $request->nama_berita,
                'isi_berita' => $request->isi_berita,
                'tgl_berita' => $request->tgl_berita
            ]);
            return redirect()->back()->with(['success' => 'Data Telah diperbarui']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Berita::findOrFail($request->id)->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
