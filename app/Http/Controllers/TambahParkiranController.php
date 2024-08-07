<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Motor;
use App\Models\Parkir;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TambahParkiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motor = Motor::getAllMotor();
        $data = [
            'merek' => Merek::all(),
            'motor' => $motor,
        ];
        return view('transaksi.tambahData', $data);
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
        $request->validate([
            'platNomor'         => 'required',
            'properti'          => 'required',
        ]);


        $transaction = Parkir::create([
            'id_motor' => $request->idMotor,
            'plat_nomor' => $request->platNomor,
            'properti' => $request->properti,
            'jam_masuk' => Carbon::now(),
            'status' => 'diproses',
        ]);

        return redirect()->route('struk', [$transaction]);
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
    public function update(Request $request, Parkir $parkir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parkir $parkir)
    {
        //
    }
    public function struk($idParkir)
    {

        $data = [
            'title' => 'Struk',
            'date' => date('m/d/Y'),
            'data' => Parkir::getParkirByID($idParkir)
        ];

        return view('struk.struk', $data);
    }
}
