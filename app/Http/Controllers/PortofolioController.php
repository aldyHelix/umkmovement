<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portofolio;
use Carbon\Carbon;
use Image;
use File;

class PortofolioController extends Controller
{
    public $path;
    public $dimensions;
    public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = public_path('imagesupload/portofolio');
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
        $portofolio = Portofolio::all();
        return view('admin/portofolio', compact('portofolio'));
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
        $this->validate($request, [
            'nama_portofolio' => 'required',
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
        Portofolio::create([
            'nama_portofolio' => $request->nama_portofolio,
            'deskripsi_portofolio' => $request->deskripsi_portofolio,
            'tgl_selesai' => $request->tgl_selesai,
            'foto_portofolio' => $fileName,
            'foto_dimension' => implode('|', $this->dimensions),
            'foto_path' => $this->path,
            'is_done' => $request->is_done
        ]);
        return redirect()->back()->with(['success' => 'Data tersimpan dan Gambar Telah Di-upload']);
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
        //JIKA FOLDERNYA BELUM ADA
        if (!File::isDirectory($this->path)) {
            //MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($this->path);
        }

        if ($request->image) {
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
            
            Portofolio::findOrFail($request->id)->update([
                'nama_portofolio' => $request->nama_portofolio,
                'deskripsi_portofolio' => $request->deskripsi_portofolio,
                'tgl_selesai' => $request->tgl_selesai,
                'foto_portofolio' => $fileName,
                'foto_dimension' => implode('|', $this->dimensions),
                'foto_path' => $this->path,
                'is_done' => $request->is_done
            ]);
            return redirect()->back()->with(['success' => 'Data diperbarui dan Gambar Telah diperbarui']);
        } else {
            Portofolio::findOrFail($request->id)->update([
                'nama_portofolio' => $request->nama_portofolio,
                'deskripsi_portofolio' => $request->deskripsi_portofolio,
                'tgl_selesai' => $request->tgl_selesai,
                'is_done' => $request->is_done
            ]);
            return redirect()->back()->with(['success' => 'Data diperbarui dan Gambar Telah diperbarui']);
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
        Portofolio::findOrFail($request->id)->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
