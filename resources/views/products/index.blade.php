@extends('layouts.app')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="pull-right">
            {{-- @can('product-create')
            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create Barang</a>
            @endcan --}}
            <a class="btn btn-success" href="{{ route('product.export') }}">Export Barang</a>
        </div>
        <hr>
      <table id="myTable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            {{-- <th width="">Action</th> --}}
        </tr>
        </thead>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
