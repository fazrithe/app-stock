<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head');
</head>
<body>
<div class="wrapper">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><img src="{{ asset('assets/img/logo2.png') }}" alt="User Image" width="50%">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="col mb-4">
                        <div class="text-center text-bold">STOCK OPNAME TOKO</div>
                    </div>
                    <form method="POST" action="{{ route('actionlogin') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Kode Barang') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search this blog">
                                    <div class="input-group-append">
                                      <button class="btn btn-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="20" height="20"
                                        viewBox="0 0 50 50"
                                        style=" fill:#000000;"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path></svg>
                                        </button>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </form>
                        <div class="row">
                            <div class="col-6">
                                <label>Dragon</label>
                            </div>
                            <div class="col-6">
                                <label>121213121</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>DGN-121</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Toko seduh teh china</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-right">
                                <label>Jumlah :</label>
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control" name="amount">
                            </div>
                            <div class="col-4 text-left">
                                <label>EA</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <Button class="btn btn-primary">Save</Button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="main-footer">
    <strong>@2022<a href="#">Tiang Liong</a>.</strong>
    All rights reserved.
  </footer>
</div>
</body>
