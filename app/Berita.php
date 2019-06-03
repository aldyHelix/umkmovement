<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'nama_berita', 'isi_berita', 'tgl_berita', 'foto_filename', 'foto_dimension', 'foto_path'
    ];
}
