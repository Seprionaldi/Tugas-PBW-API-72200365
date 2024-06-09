@extends('layouts/main')
@section('title', 'edit komiks')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/update/{{ $KM->id }}" method="POST" enctype="multipart/form-data">
                @csrf   
                @method('PUT')
                <div class="form-group">
                    <label><i class="bi bi-amd"></i> Title </label>
                    <input type="text" name="title" class="form-control" value="{{ $KM->title }}" required>
                </div>
                <div class="form-group">
                    <label><i class="bi bi-google"></i></i> Genre </label>
                    <select name="genre" class="form-control">
                        <option value="0"> >---Pilih Genre----< </option>
                        <option value="Action" {{ ($KM->genre == "Action") ? "selected":"" }}> Action </option>
                        <option value="Comedy" {{ ($KM->genre == "Comedy") ? "selected":"" }}> Comedy </option>
                        <option value="Fantasy"{{ ($KM->genre == "Fantasy") ? "selected":"" }}> Fantasy </option>
                        <option value="Romance"{{ ($KM->genre == "Romance") ? "selected":"" }}> Romance </option>
                        <option value="Crime"  {{ ($KM->genre == "Crime") ? "selected":"" }}> Crime </option>
                        <option value="scifi"  {{ ($KM->genre == "scifi") ? "selected":"" }}> Sci-fi </option>
                        <option value="Thriller"{{ ($KM->genre == "Thriller") ? "selected":"" }}> Thriller </option>
                        <option value="MECHA"  {{ ($KM->genre == "MECHA") ? "selected":"" }}> MECHA </option>
                    </select>
                </div>
                <div class="form-goup">
                    <label><i class="bi bi-gem"></i> Year </label>
                    <input type="number" min="1900" max="2100" name="year" class="form-control" value="{{ $KM->year }}" required>
                </div>
                <div class="form-group">
                    <label><i class="bi bi-image-alt"></i> Poster </label>
                    <input type="file" accept="image/*" name="poster" class="form-control-file" required>
                </div>
                <td>
                    <img src="{{ asset('/storage/'.$KM->poster) }}" alt="{{ $KM->poster }}" height="80"
                    width="80">
                </td>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
