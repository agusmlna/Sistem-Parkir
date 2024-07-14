<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Parkir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahParkiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motor = DB::table('motors')
            ->join('mereks', 'mereks.id', '=', 'motors.id_merek')
            ->join('jenis_motors', 'jenis_motors.id', '=', 'motors.id_jenis')
            ->select('motors.*', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->get();
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
            'data' => Parkir::leftJoin('motors', 'Parkirs.id_motor', '=', 'motors.id')
                ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
                ->where('Parkirs.id', $idParkir)
                ->select('Parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
                ->first()
        ];

        return view('struk.struk', $data);
    }
}
