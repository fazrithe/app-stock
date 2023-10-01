@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Show Sub Category</h3>
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


        <form action="{{ route('category-sub.update',$category->id) }}" method="POST">
            @csrf


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Nama Barang" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <select class="form-control" name="category">
                            @foreach($category_parent as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
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
