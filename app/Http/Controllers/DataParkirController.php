<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
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
        $dataMotor = Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->whereDate('parkirs.created_at', date('Y-m-d'))
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->get();

        $data = [
            'title' => 'Detail Data Produk',
            'dataMotor' => $dataMotor
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
        $parkir = Parkir::findOrFail($id);

        $parkir->update([
            'status' => 'dibatalkan',
        ]);
        return redirect('/data-parkir');
    }

    public function cash($id, Request $request)
    {
        Parkir::where('id', $id)
            ->update([
                'status' => 'selesai',
                'tipe_pembayaran' => 'cash',
                'jam_keluar' => Carbon::now(),
            ]);
        return redirect('/data-parkir');
    }

    public function transfer($id, Request $request)
    {
        // upload image
        $image = $request->file('bukti-bayar');
        $image->storeAs('public/images', $image->hashName());

        Parkir::where('id', $id)
            ->update([
                'bukti_bayar' => $image->hashName(),
                'status' => 'selesai',
                'tipe_pembayaran' => 'transfer',
                'jam_keluar' => Carbon::now(),
            ]);
        return redirect('/data-parkir');
    }

    public function komplain($id, Request $request)
    {
        Parkir::where('id', $id)
            ->update([
                'komplain' => $request->komplain,
            ]);
        return redirect('/data-parkir');
    }
}
