@extends('layouts.app')


@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<style>
    .dropzone {
        background: #e3e6ff;
        border-radius: 13px;
        max-width: 550px;
        margin-left: auto;
        margin-right: auto;
        border: 2px dotted #1833FF;
        margin-top: 50px;
    }
</style>
<div class="row">
    <div class="col">
        <h2>Upload Gambar</h2>
    </div>
    <div class="col text-right">
        <a href="{{ route('images') }}" class="btn btn-danger">Kembali</a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <div id="file-upload-box" >
            <div class="row" id="file-dropzone">
                <div class="col-md-12">
                    <div class="dropzone" id="file-dropzone"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     Dropzone.options.fileDropzone = {
      url: '{{ route('images.upload.store') }}',
      acceptedFiles: ".jpeg,.jpg,.png,.pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.mp4,.wmv,.mpeg,.ogg",
      addRemoveLinks: true,
      maxFilesize: 8,
      headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      removedfile: function(file)
      {
        var name = file.upload.filename;
        $.ajax({
          type: 'POST',
          url: '{{ route('images.upload.destroy') }}',
          data: { "_token": "{{ csrf_token() }}", name: name},
          success: function (data){
              console.log(data);
          },
          error: function(e) {
              console.log(e);
          }});
          var fileRef;
          return (fileRef = file.previewElement) != null ?
          fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },
      success: function (file, response) {
        // console.log('ss');
      },
    }
</script>
@endsection
