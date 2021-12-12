@extends('layout.navbar')

@section('content')
<div class="container d-flex flex-column min-vh-100">
    <h4 class="text-center fw-bold">Input Vaccine</h4>
    <form action="{{ route('vaccine.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Vaccine Name</label>
            <input type="text" class="form-control" name="nama" id="exampleInputEmail1">
        </div>
        <div class="mt-2 form-group">
            <label for="harga">Price</label>
            <div class="input-group">
                <div class="input-group-text">Rp</div>
                <input type="text" name="harga" class="form-control" id="autoSizingInputGroup">
            </div>
        </div>
        <div class="mt-2 form-group">
            <label for="deskripsi">Description</label>
            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mt-2 form-group">
            <label for="image">Image</label>
            <br>
            <input type="file" name="image" id="">
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    </form>
</div>
@endsection