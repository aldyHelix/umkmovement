<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'headline', 'deskripsi'
    ];
}
