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
        @can('product-edit')
        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ route('product.export') }}">
                @csrf
                <div class="form-group row">
                    <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal') }}</label>

                    <div class="col-md-6">
                        <input id="tanggal" type="text" class="date1 form-control" name="date" value="" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-right">
                    <button class="btn btn-success">Export Barang</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-6">
                <form method="POST" action="{{ route('product.showDate') }}">
                @csrf
                <div class="form-group row">
                    <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal') }}</label>

                    <div class="col-md-6">
                        <input id="tanggal" type="text" class="date1 form-control" name="date" value="" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-right">
                    <button class="btn btn-success">Tampil Barang</button>
                    </div>
                </div>
            </form>
            </div>
        </div><hr>
        @endcan
        <div class="row">
            <div class="col-2">
                @can('product-create')
                <a class="btn btn-primary" href="{{ route('products.create') }}"> Create Barang</a>
                @endcan
            </div>
            <div class="col-2">
                @can('product-import')
                <a class="btn btn-danger" href="{{ route('product.import') }}"> Import Barang</a>
                @endcan
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th width="">Action</th>
                    </tr>
                    </thead>
                        @foreach($products as $item)
                        <tr>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->barcode }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td width="">
                            <a class="btn btn-info" href="{{ route('products.show',$item->id) }}">Show</a>
                            @can('product-edit')
                            <a class="btn btn-success" href="{{ route('products.edit',$item->id) }}">Edit</a>
                            @endcan
                            @can('product-delete')
                             {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $item->id],'style'=>'display:inline']) !!}
                                 {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                             {!! Form::close() !!}
                            @endcan
                        </td>
                        </tr>
                        @endforeach
                  </table>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

<script type="text/javascript">
    $('.date1').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true,
     });
</script>
@endsection
