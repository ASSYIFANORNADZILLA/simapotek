<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemasok extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_pemasok',
        'alamat',
        'kota',
        'no_hp',
    ];
}
