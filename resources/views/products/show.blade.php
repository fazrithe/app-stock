@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Show Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $product->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                    {{ $product->detail }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
