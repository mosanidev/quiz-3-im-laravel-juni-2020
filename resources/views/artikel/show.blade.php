@extends('layouts.master')

@section('content')

    {{-- {{dd($artikel)}} --}}
    <div class="container">
      <h3>judul:{{$artikel->judul}}</h3>
      <p>slug:{{$artikel->slug}}</p>
      <p>{{$artikel->isi}}</p>
        @foreach (explode(',', $artikel->tag) as $tag)
            <button type="button" class="btn btn-success">{{$tag}}</button>
        @endforeach
    </div>

@endsection