<?php

namespace App\Http\Controllers;

use App\Models\ModelPasien;
use App\Models\ModelVaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ControllerPasien extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPasien = ModelVaksin::join('patients', 'patients.vaccine_id', '=', 'vaccines.id')->get(['patients.*', 'vaccines.name AS nama_vaksin']);
        $row = DB::table('patients')->count();

        return view('pasienView.index', compact('dtPasien', 'row'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $vaksin = ModelVaksin::find($id);
        return view('pasienView.create', compact('vaksin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $nama_ktp = $image->getClientOriginalName();
        $image->storeAs('public/img/ktp/', $nama_ktp);

        ModelPasien::create([
            'vaccine_id' => $request->vaksin_id,
            'name' => $request->nama_pasien,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'image_ktp' => $nama_ktp,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('patient.index');
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
        $pasien = ModelPasien::find($id);
        return view('pasienView.edit', compact('pasien'));
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
        $pasien = ModelPasien::findOrFail($id);

        if ($request->file('image') != "") {

            Storage::disk('local')->delete('public/img/ktp/' . $pasien->image);

            $image = $request->file('image');
            $nama_ktp = $image->getClientOriginalName();
            $image->storeAs('public/img/ktp/', $nama_ktp);

            $pasien->update([
                'vaccine_id' => $request->vaksin_id,
                'name' => $request->nama_pasien,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'image_ktp' => $nama_ktp,
                'no_hp' => $request->no_hp
            ]);
        } else {

            $pasien->update([
                'vaccine_id' => $request->vaksin_id,
                'name' => $request->nama_pasien,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp
            ]);
        }

        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelPasien $pasien)
    {
        $pasien->delete();
        Storage::disk('local')->delete('public/img/ktp/' . $pasien->image);
        return redirect()->route('patient.index');
    }
}
