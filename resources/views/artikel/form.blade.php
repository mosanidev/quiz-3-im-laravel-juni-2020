@extends('layouts.master')

@section('content')

    <form action="/artikel" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" placeholder="Masukkan judul artikel" name="judul">
        </div>
        <div class="form-group">
            <label for="isi">Isi</label>
            <textarea class="form-control" rows="3" placeholder="Masukkan isi artikel" name="isi"></textarea>
        </div>
        <div class="form-group">
            <label for="tag">Tag</label><br>
            <input type="text"  placeholder="Masukkan tag artikel" id="tags" data-role="tagsinput" name="tag">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

@push('link-input-tag')
    <link rel="stylesheet" href=" {{ asset('sbadmin2/css/bootstrap-tagsinput.css') }} ">
@endpush

@push('script-input-tag')
    <script src=" {{asset('sbadmin2/js/bootstrap-tagsinput.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endpush