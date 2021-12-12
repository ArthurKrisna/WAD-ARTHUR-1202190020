@extends('layout.navbar')

@section('content')
<div class="container d-flex flex-column min-vh-100">
    <h4 class="text-center fw-bold">Edit Patient</h4>
    <form action="{{ route('patient.update', $pasien->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="vaksin_id">Vaccine Id</label>
            <input type="text" class="form-control" value="{{old('vaccine_id',$pasien->vaccine_id)}}" name="vaksin_id"
                id="exampleInputEmail1" readonly>
        </div>
        <div class="mt-2 form-group">
            <label for="nama_pasien">Patient Name</label>
            <input type="text" class="form-control" value="{{old('name',$pasien->name)}}" name="nama_pasien"
                id="exampleInputEmail1">
        </div>
        <div class="mt-2 form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" value="{{old('nik',$pasien->nik)}}" name="nik"
                id="exampleInputEmail1">
        </div>
        <div class="mt-2 form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" value="{{old('alamat',$pasien->alamat)}}" name="alamat"
                id="exampleInputEmail1">
        </div>
        <div class="mt-2 form-group">
            <label for="image">KTP</label>
            <br>
            <input type="file" name="image" value="{{old('image_ktp',$pasien->image_ktp)}}" id="">
        </div>
        <div class="mt-2 form-group">
            <label for="no_hp">No Hp</label>
            <input type="text" class="form-control" name="no_hp" value="{{old('no_hp',$pasien->no_hp)}}"
                id="exampleInputEmail1">
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Update</button>
    </form>
</div>
@endsection