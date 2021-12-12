@extends('layout.navbar')

@section('content')
<div class="min-vh-150 align-items-center align-content-center">
    @if($row==0)
    <p class="text-muted text-center">There is no data...</p>
    <div class="d-flex justify-content-center">
        <a href="{{ route('pilih.index') }}" class="btn btn-primary">Register Patient</a>
    </div>
    @else
    <div class="container">
        <h4 class="text-center fw-bold">List Patient</h4>
        <div class="d-flex justify-content-center">
            <div class="col-10">
                <a href="{{ route('pilih.index') }}" class="btn btn-primary mb-2">Register Patient</a>
                <div class="card border-0">
                    <table class="table table-primary table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Vaccine</th>
                                <th>Name</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtPasien as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_vaksin}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->no_hp}}</td>
                                <td>
                                    <form action="{{ route('patient.destroy', $item->id) }}" method="POST">
                                        <a href="{{route('patient.edit', $item->id)}}" class="btn btn-warning">Edit</a>
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