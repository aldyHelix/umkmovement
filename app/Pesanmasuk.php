<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanmasuk extends Model
{
    protected $fillable = [
      'nama','email','nomer_tlep','pesan',  
    ];
}
