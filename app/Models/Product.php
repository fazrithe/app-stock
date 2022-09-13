<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'detail','barcode','merk','kode_barang','nama_barang','satuan','harga_jakarta','harga_bali',
        'gambar','nama_toko','stok_toko','nama_gudang','stok_gudang'
    ];
}
