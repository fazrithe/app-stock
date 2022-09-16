<table>
    <thead>
        <tr>
            <th>Barcode</th>
            <th>Merk</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th colspan="5">Toko</th>
            <th>Total Toko</th>
            <th colspan="5">Gudang</th>
            <th>Total Gudang</th>
            <th>Tanggal</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Toko 1</th>
            <th>Toko 2</th>
            <th>Toko 3</th>
            <th>Toko 4</th>
            <th>Toko 5</th>
            <th></th>
            <th>Gudang 1</th>
            <th>Gudang 2</th>
            <th>Gudang 3</th>
            <th>Gudang 4</th>
            <th>Gudang 5</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->barcode }}</td>
                <td>{{ $dt->merk }}</td>
                <td>{{ $dt->kode_barang }}</td>
                <td>{{ $dt->nama_barang }}</td>
                <td>{{ $dt->satuan }}</td>
                <td>{{ $dt->stok_toko1 }}</td>
                <td>{{ $dt->stok_toko2 }}</td>
                <td>{{ $dt->stok_toko3 }}</td>
                <td>{{ $dt->stok_toko4 }}</td>
                <td></td>
                <td>{{ $dt->stok_gudang1 }}</td>
                <td>{{ $dt->stok_gudang2 }}</td>
                <td>{{ $dt->stok_gudang3 }}</td>
                <td>{{ $dt->stok_gudang4 }}</td>
                <td>{{ $dt->stok_gudang5 }}</td>
                <td></td>
                <td>{{ $dt->stock_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
