@extends('layout.navbar')

@section('content')
<h4 class="text-center fw-bold">About Us</h4>
<div class="min-vh-150 align-items-center align-content-center">
    <div class="row justify-content-center">
        <div class="col-3">
            <img src="{{asset('ilustrasi/covid-19.jpg')}}" style="width:320px;height:320px">
        </div>
        <div class="col-5">
            <p class="text-justify align-items-center" style="margin-top:100px;margin-left:50px">Virus Corona atau severe acute respiratory syndrome coronavirus 2 (SARS-CoV-2) adalah virus yang menyerang sistem pernapasan. Penyakit akibat infeksi virus ini disebut COVID-19. Virus Corona bisa menyebabkan gangguan ringan pada sistem pernapasan, infeksi paru-paru yang berat, hingga kematian..</p>
        </div>
    </div>
</div>
@endsection