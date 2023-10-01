@extends('layouts.app')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Kategori Galeri</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="pull-right">
            @can('product-create')
            <a class="btn btn-primary" href="{{ route('category-sub-gallery.create') }}"> Create Sub Kategori</a>
            @endcan
        </div>
      <hr>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nama Sub Kategori</th>
            <th width="">Action</th>
        </tr>
        </thead>
            @foreach($gallery as $item)
            <tr>
            <td>{{ $item->name }}</td>
            <td width="">
                <a class="btn btn-success" href="{{ route('category-sub-gallery.edit',$item->id) }}">Edit</a>
                 {!! Form::open(['method' => 'DELETE','route' => ['category-sub-gallery.destroy', $item->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}</td>
            </tr>
            @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
