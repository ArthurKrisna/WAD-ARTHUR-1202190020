@extends('layout.navbar')

@section('content')
<div class="container d-flex flex-column min-vh-100">
    <h4 class="text-center fw-bold">Edit Vaccine</h4>
    <form action="{{ route('vaccine.update', $vaksin->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Vaccine Name</label>
            <input type="text" class="form-control" name="nama" value="{{old('name',$vaksin->name)}}"
                id="exampleInputEmail1">
        </div>
        <div class="mt-2 form-group">
            <label for="harga">Price</label>
            <div class="input-group">
                <div class="input-group-text">Rp</div>
                <input type="text" name="harga" value="{{old('price',$vaksin->price)}}" class="form-control"
                    id="autoSizingInputGroup">
            </div>
        </div>
        <div class="mt-2 form-group">
            <label for="deskripsi">Description</label>
            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1"
                rows="3">{{old('description',$vaksin->description)}}</textarea>
        </div>
        <div class="mt-2 form-group">
            <label for="image">Image</label>
            <br>
            <input type="file" value="{{old('image',$vaksin->image)}}" name="image" id="">
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Update</button>
    </form>
</div>
@endsection