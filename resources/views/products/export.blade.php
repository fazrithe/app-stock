<table>
    <thead>
        <tr>
            <th>Barcode</th>
            <th>Merk</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Stok Toko</th>
            <th>Stok Barang</th>
            <th>Sales</th>
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
                <td>{{ $dt->stok_toko }}</td>
                <td>{{ $dt->stok_gudang }}</td>
                <td>{{ $dt->name_user }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
