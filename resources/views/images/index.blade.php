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
            <div class="col-md-4">
              <div class="thumbnail">
                <a href="/w3images/lights.jpg">
                  <img src="/w3images/lights.jpg" alt="Lights" style="width:100%">
                  <div class="caption">
                    <p>Lorem ipsum...</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="thumbnail">
                <a href="/w3images/nature.jpg">
                  <img src="/w3images/nature.jpg" alt="Nature" style="width:100%">
                  <div class="caption">
                    <p>Lorem ipsum...</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="thumbnail">
                <a href="/w3images/fjords.jpg">
                  <img src="/w3images/fjords.jpg" alt="Fjords" style="width:100%">
                  <div class="caption">
                    <p>Lorem ipsum...</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                  <a href="/w3images/fjords.jpg">
                    <img src="/w3images/fjords.jpg" alt="Fjords" style="width:100%">
                    <div class="caption">
                      <p>Lorem ipsum...</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="thumbnail">
                  <a href="/w3images/fjords.jpg">
                    <img src="/w3images/fjords.jpg" alt="Fjords" style="width:100%">
                    <div class="caption">
                      <p>Lorem ipsum...</p>
                    </div>
                  </a>
                </div>
              </div>
          </div>

    </div>
</div>
@endsection
