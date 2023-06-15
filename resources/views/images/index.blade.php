@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col">
        <h2>Data Gambar</h2>
    </div>
    <div class="col text-right">
        <a href="{{ route('images.upload') }}" class="btn btn-primary">Create</a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <div class="row">
            @foreach($images as $value)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <div class="thumbnail">
                        <a href="/w3images/lights.jpg">
                        <img src="{{ asset('/public/'.$value->image_url) }}" alt="Lights" style="width:100%">
                        <div class="caption">
                            <p>{{ $value->image_name }}</p>
                        </div>
                        <div class="caption">
                            <p>{{ $value->image_url }}</p>
                        </div>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
