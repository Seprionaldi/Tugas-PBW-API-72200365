@extends('layouts/main')
@section('title', 'form add komiks')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/save" method="POST" enctype="multipart/form-data">
                @csrf   
                <div class="form-group">
                    <label><i class="bi bi-amd"></i> Title </label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label><i class="bi bi-google"></i></i> Genre </label>
                    <select name="genre" class="form-control">
                        <option value="0"> >---Pilih Genre----< </option>
                        <option value="Action"> Action </option>
                        <option value="Comedy"> Comedy </option>
                        <option value="Fantasy"> Fantasy </option>
                        <option value="Romance"> Romance </option>
                        <option value="Crime"> Crime </option>
                        <option value="scifi"> Sci-fi </option>
                        <option value="Thriller"> Thriller </option>
                        <option value="MECHA"> MECHA </option>
                    </select>
                </div>
                <div class="form-goup">
                    <label><i class="bi bi-gem"></i> Year </label>
                    <input type="number" min="1900" max="2100" name="year" class="form-control" required>
                </div>
                <div class="form-group">
                    <label><i class="bi bi-image-alt"></i> Poster </label>
                    <input type="file" accept="image/*" name="poster" class="form-control-file" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
