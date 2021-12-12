@extends('layout.navbar')

@section('content')
<h4 class="text-center fw-bold">List Vaccine</h1>
    <div class="container col-7 mt-3">
        <div class="row">
            @foreach($dtVaksin as $item)
            <div class="card p-0 col-5">
                <img class="card-img-top" src="{{ Storage::url('public/img/vaccine/'.$item->image )}}" height="170"
                    alt="{{ $item->image }}">
                <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <p class="text-muted">Rp {{$item->price}}</p>
                    <p class="card-text">{{$item->description}}</p>
                </div>
                <div class="card-footer">
                    <a href="/patient/create/{{$item->id}}/" class="btn btn-primary col-12">Vaccine Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection