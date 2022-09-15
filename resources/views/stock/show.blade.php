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
                        <div class="text-right">
                            <label>{{ $data['login_date'] }}</label>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Kode Barang') }}</label>
                            <div class="col-md-6">

                            <form method="POST" action="{{ route('product.search') }}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Cari Kode Barang/ Barcode">
                                    <div class="input-group-append">
                                      <button class="btn btn-primary" id="btnsearch" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="20" height="20"
                                        viewBox="0 0 50 50"
                                        style=" fill:#000000;"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label id="merk">{{ $data->merk }}</label>
                            </div>
                            <div class="col-6">
                                <label id="barcode">{{ $data->barcode }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label id="nama_barang">{{ $data->nama_barang }}</label>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col">
                                <p>Toko seduh teh china</p>
                            </div>
                        </div> --}}
                        <hr>
                        <div id="jumlah" style="display: block">
                                <div class="row">
                                    <div class="col-4 text-right">
                                        <label>Stok Toko</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="hidden" id="id" class="form-control" name="id">
                                        <input type="number"  class="form-control" name="stock" value="{{ $data->stok_toko }}" readonly>
                                    </div>
                                    <div class="col-4 text-left">
                                        <label id="satuan">{{ $data->satuan }}</label>
                                    </div>
                                </div>
                        </div>
                        <hr>
                        <div id="jumlah" style="display: block">
                            <div class="row">
                                <div class="col-4 text-right">
                                    <label>Stok Gudang</label>
                                </div>
                                <div class="col-4">
                                    <input type="hidden" id="id" class="form-control" name="id">
                                    <input type="number" class="form-control" name="stock" value="{{ $data->stok_gudang }}" readonly>
                                </div>
                                <div class="col-4 text-left">
                                    <label id="satuan">{{ $data->satuan }}</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="jumlah" style="display: block">
                            <div class="row">
                                <div class="col-4 text-right">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <input type="hidden" id="id" class="form-control" name="id">
                                    <input type="number" class="form-control" name="stock" value="{{ $data->stok_gudang }}" readonly>
                                </div>
                                <div class="col-4 text-left">
                                    <label id="satuan">{{ $data->satuan }}</label>
                                </div>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>
    jQuery(document).ready(function(){
       jQuery('#btnsearch').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });
          jQuery.ajax({
             url: "{{ route('product.search') }}",
             method: 'post',
             data: {
                kode_barang: jQuery('#kode_barang').val(),
             },
             success: function(result){
                var result = JSON.parse(result);

                if(result.statusCode == 200){
                    jQuery('#merk').html(result.data.merk);
                    jQuery('#nama_barang').html(result.data.nama_barang);
                    jQuery('#barcode').html(result.data.barcode);
                    jQuery('#satuan').html(result.data.satuan);
                    jQuery('#id').val(result.data.id);
                    var x = document.getElementById("jumlah");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }else{
                    alert("Data tidak ditemukan !");
                }
             }});
          });
       });
</script>
