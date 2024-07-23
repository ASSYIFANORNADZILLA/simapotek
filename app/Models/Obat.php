<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_obat'; // Menetapkan primary key sebagai kode_obat
    public $incrementing = false; // Menandakan bahwa primary key tidak auto-increment
    protected $keyType = 'string'; // Menetapkan tipe primary key sebagai string

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'kode_kategori',
        'supplier',
        'stok',
        'harga_beli', 
        'harga_jual', 
        'tanggal_expired'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode_kategori');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'supplier', 'id');
    }
}