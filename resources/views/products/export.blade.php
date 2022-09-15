<table>
    <thead>
        <tr>
            <th>Barcode</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok Toko</th>
            <th>Stok Barang</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->barcode }}</td>
                <td>{{ $dt->kode_barang }}</td>
                <td>{{ $dt->nama_barang }}</td>
                <td>{{ $dt->stok_toko }}</td>
                <td>{{ $dt->stok_barang }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
