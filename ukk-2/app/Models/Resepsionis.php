<?php

namespace App\Models;

use App\Models\Resepsionis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resepsionis extends Model
{
    use HasFactory;
    protected $table = 'resepsionis';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
