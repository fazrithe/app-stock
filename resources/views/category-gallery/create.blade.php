@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Create Gambar</h3>
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


        <form action="{{ route('category-gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Barang:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Nama Barang" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Type:</strong>
                        <select class="form-control" name="type">
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                            <option value="data">Data</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
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
