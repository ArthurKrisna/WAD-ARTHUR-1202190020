<?php

namespace App\Http\Controllers;

use App\Models\ModelVaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ControllerVaksin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtVaksin = ModelVaksin::orderBy('id', 'desc')->get();
        $row = DB::table('vaccines')->count();

        return view('vaksinView.index', compact('dtVaksin', 'row'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaksinView.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $nama_ktp = $image->getClientOriginalName();
        $image->storeAs('public/img/vaccine/', $nama_ktp);

        ModelVaksin::create([
            'name' => $request->nama,
            'price' => $request->harga,
            'description' => $request->deskripsi,
            'image' => $nama_ktp
        ]);

        return redirect()->route('vaccine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaksin = ModelVaksin::find($id);
        return view('vaksinView.edit', compact('vaksin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vaksin = ModelVaksin::findOrFail($id);

        if ($request->file('image') != "") {

            Storage::disk('local')->delete('public/img/vaccine/' . $vaksin->image);

            $image = $request->file('image');
            $nama_ktp = $image->getClientOriginalName();
            $image->storeAs('public/img/vaccine/', $nama_ktp);

            $vaksin->update([
                'name' => $request->nama,
                'price' => $request->harga,
                'description' => $request->deskripsi,
                'image' => $nama_ktp
            ]);
        } else {

            $vaksin->update([
                'name' => $request->nama,
                'price' => $request->harga,
                'description' => $request->deskripsi
            ]);
        }

        return redirect()->route('vaccine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaksin = ModelVaksin::find($id);
        $vaksin->delete();
        Storage::disk('local')->delete('public/img/vaccine/' . $vaksin->image);
        return redirect()->route('vaccine.index');
    }
}
