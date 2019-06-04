<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nama_service', 'tagline', 'range_1', 'range_2', 'fitur_1', 'fitur_2', 'fitur_3', 'fitur_4', 'fitur_5', 'persentase', 'deskripsi', 'logo_name'
    ];
}
