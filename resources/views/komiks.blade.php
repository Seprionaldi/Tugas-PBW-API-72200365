@extends('layouts/main')
@section('title','Komiks')
@section('artikel')
   <div class="card">
    <div class="card-header">
        <a href="/komiks/formadd" class="btn btn-primary"><i class="bi bi-plus-square"></i>-_- Komiks </a>
    </div>
        <div class="card-body">
            @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('alert') }}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Poster</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($KM as $i => $k)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $k ->title }}</td>
                        <td>{{ $k->genre }}</td>
                        <td>{{ $k->year }}</td>
                        <td>
                            <img src="{{ asset('/storage/'.$k->poster) }}" alt="{{ $k->poster }}" height="80"
                            width="80">
                        </td>
                        <td>
                            <a href="/form-edit/{{ $k->id }}" class="btn btn-success"><i class="bi bi-brilliance"></i></a>
                            <a href="/form-delete/{{ $k->id }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
   </div>
@endsection

