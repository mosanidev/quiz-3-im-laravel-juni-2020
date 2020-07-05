@extends('layouts.master')

@section('content')

    {{-- {{dd($artikel)}} --}}
    <div class="container">
      <h1>Tabel Artikel</h1>
      <a href="/artikel/create" class="btn btn-primary my-2 ">Create</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Artikel</th>
                <th scope="col">Cuplikan Artikel</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                  @foreach ($artikel as $key => $value)
                    <tr>
                      <td scope="row" class="p-3">{{$value->id}}</td>
                      <td class="p-3">{{$value->judul}}</td>
                      <td class="p-3">{{
                              \Illuminate\Support\Str::limit($value->isi, 35)
                          }}
                      </td>
                      <td>
                          <a href="/artikel/{{$value->id}}" class="btn btn-primary mr-2">Show</a>
                          <a href="/artikel/{{$value->id}}/edit" class="btn btn-primary mr-2">Edit</a>
                          <form action="/artikel/{{$value->id}}" method="POST" style="display: inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-primary mr-2">Delete</i></button>
                          </form>
                      </td>
                    </tr>
                  @endforeach
            </tbody>
          </table>
    </div>

@endsection

@push('scripts')
  <script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
  </script>
@endpush