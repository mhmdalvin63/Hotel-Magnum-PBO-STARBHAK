<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tamu extends Model
{
    protected $fillable = [
        'namapemesan','email','notelp','namatamu','tipekamar','tglcekin','tglcekout','jmlkamar',
    ];
}
