<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jamkerja extends Model
{
    protected $fillable = ['hari', 'mulai', 'selesai', 'is_checked'];
}
