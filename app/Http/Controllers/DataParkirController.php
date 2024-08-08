<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Merek;
use App\Models\Motor;
use App\Models\Parkir;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Detail Data Produk',
            'dataMotor' => Parkir::GetParkirDateNow(),
            'motorForEdit' => Motor::getAllMotor(),
            'merek' => Merek::all(),

        ];

        return view('transaksi.dataParkir', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Parkir $parkir)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parkir $parkir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $request->validate([
            'inputKomplainProperti'         => 'required',
        ]);
        $komplain = Komplain::create([
            'komplain' => $request->inputKomplainProperti,
            'status' => 'diproses',
        ]);
        $parkir = Parkir::findOrFail($id);
        $parkir->update([
            'id_komplain' => $komplain->id,
        ]);

        return redirect('/komplain');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Parkir::cancelParkir($id);

        return redirect('/data-parkir');
    }

    public function cash($id, Request $request)
    {
        Parkir::payWithCash($id, Carbon::now());
        return redirect('/data-parkir');
    }

    public function transfer($id, Request $request)
    {
        // upload image
        $image = $request->file('bukti-bayar');
        $image->storeAs('public/images', $image->hashName());

        Parkir::payWithTRansfer($id, Carbon::now(), $image->hashName());
        return redirect('/data-parkir');
    }

    public function editParkir(Request $request, int $id)
    {
        $request->validate([
            'merek'         => 'required|not_in:0',
            'motor'         => 'required|not_in:0',
            'platNomor'     => 'required',
        ]);

        Parkir::where('id', '=', $id)
            ->update([
                'id_motor' => $request->motor,
                'plat_nomor' => $request->platNomor,
                'properti' => $request->properti,
            ]);

        return redirect('/data-parkir');
    }


    public function komplain($id, Request $request)
    {
        Parkir::addKomplain($id, $request->komplain);
        return redirect('/data-parkir');
    }
}
