<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = [
        'nama_portofolio', 'deskripsi_portofolio', 'tgl_selesai', 'foto_portofolio', 'foto_dimension', 'foto_path', 'is_done'
    ];
}
