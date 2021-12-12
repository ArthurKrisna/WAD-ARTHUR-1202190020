@extends('layout.navbar')

@section('content')
<div class="min-vh-150 align-items-center align-content-center">
    @if($row==0)
    <p class="text-muted text-center">There is no data...</p>
    <div class="d-flex justify-content-center">
        <a href="{{route('vaccine.create')}}" class="btn btn-primary">Add Vaccine</a>
    </div>
    @else
    <div class="container">
        <h4 class="text-center fw-bold">List Vaccine</h4>
        <div class="d-flex justify-content-center">
            <div class="col-10">
                <a href="{{route('vaccine.create')}}" class="btn btn-primary mb-2">Add Vaccine</a>
                <div class="card border-0">
                    <table class="table table-primary table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtVaksin as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <form action="{{ route('vaccine.destroy', $item->id) }}" method="POST">
                                        <a href="{{route('vaccine.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection