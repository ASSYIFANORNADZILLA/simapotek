<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use HasFactory;

    protected $primaryKey = 'nomor_faktur';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nomor_faktur', 'kode_obat', 'tanggal', 'jumlah'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat', 'kode_obat');
    }

    public function getTotalHargaAttribute()
    {
        return $this->jumlah * $this->obat->harga_jual;
    }
}
