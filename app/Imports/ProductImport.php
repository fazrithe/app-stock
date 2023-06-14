<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection, WithHeadingRow
{
       /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            Product::create([
                'barcode'       => $row['barcode'],
                'merk'          => $row['merk'],
                'kode_barang'   => $row['kode_barang'],
                'nama_barang'   => $row['nama_barang'],
                'satuan'        => $row['satuan'],
                'harga_jakarta' => $row['harga_jakarta'],
                'harga_bali'    => $row['harga_beli'],
            ]);
        }
    }
}
