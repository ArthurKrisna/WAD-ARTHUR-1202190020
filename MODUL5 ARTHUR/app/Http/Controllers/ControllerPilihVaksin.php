<?php

namespace App\Http\Controllers;

use App\Models\ModelVaksin;
use Illuminate\Http\Request;

class ControllerPilihVaksin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtVaksin = ModelVaksin::orderBy('id')->get();
        return view('pasienView.cardVaksin', compact('dtVaksin'));
    }
}
