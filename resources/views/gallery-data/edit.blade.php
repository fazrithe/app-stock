@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Gallery</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('gallery-data.update',$gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="hidden" name="id" value="{{$gallery->id}}">
                        <input type="text" name="name" value="{{$gallery->name}}" class="form-control" placeholder="Nama" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori:</strong>
                        <select class="form-control" name="category_id">
                        @foreach($category as $value)
                            @if($gallery->category_id == $value->id)
                            <option value="{{ $value->id }}" checked>{{ $value->name }}</option>
                            @else
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endif
                        @endforeach
                        </select>
                        <a href="{{route('category-gallery.index')}}">Tambah Kategori</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>File:</strong>
                        <input type="file" class="form-control" name="file">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>


        </form>
    </div>
</div>
<script type="text/javascript">
    $('#tanggal').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true,
     });
</script>
@endsection
