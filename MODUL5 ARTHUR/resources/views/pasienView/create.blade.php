@extends('layout.navbar')

@section('content')
<div class="container d-flex flex-column min-vh-100">
    <h4 class="text-center fw-bold">Register Patient</h4>
    <form action="{{route('patient.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="vaksin_id">Vaccine Id</label>
            <input type="text" class="form-control" name="vaksin_id" value="{{$vaksin->id}}" readonly>
        </div>
        <div class="mt-2 form-group">
            <label for="nama">Patient Name</label>
            <input type="text" class="form-control" name="nama_pasien" id="exampleInputEmail1">
        </div>
        <div class="mt-2 form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" name="nik" id="exampleInputEmail1">
        </div>
        <div class="mt-2 form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="exampleInputEmail1">
        </div>
        <div class="mt-2 form-group">
            <label for="image">KTP</label>
            <br>
            <input type="file" name="image" id="">
        </div>
        <div class="mt-2 form-group">
            <label for="no_hp">No Hp</label>
            <input type="text" class="form-control" name="no_hp" id="exampleInputEmail1">
        </div>
        <button type="register" class="mt-3 btn btn-primary">Register</button>
    </form>
</div>
@endsection