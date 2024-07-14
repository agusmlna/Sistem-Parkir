<?php

namespace App\Http\Controllers;

use App\Models\JenisMotor;
use App\Models\Parkir;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkir = Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->get();

        $data = [
            'title' => 'Report',
            'jenis' => JenisMotor::all(),
            'dataMotor' => $parkir,
            'start_date' => null,
            'end_date' => null
        ];

        return view('transaksi.report', $data);
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
        //
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

    public function filterDate(Request $request)
    {
        $startDate = Carbon::parse($request->startDate)->startOfDay();
        $endDate = Carbon::parse($request->endDate)->endOfDay();

        $parkir = Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->whereBetween('parkirs.created_at', [$startDate, $endDate])
            ->get();

        $data = [
            'title' => 'Report',
            'jenis' => JenisMotor::all(),
            'dataMotor' => $parkir,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'start_date_pdf' => $startDate,
            'end_date_pdf' => $endDate,
        ];

        return view('transaksi.report', $data);
    }

    public function filterJenis(Request $request)
    {
        $parkir = Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->where('jenis_motors.id', '=', $request->selectJenisMotor)
            ->get();

        $data = [
            'title' => 'Report',
            'jenis' => JenisMotor::all(),
            'dataMotor' => $parkir,
            'start_date' => null,
            'end_date' => null,
            'input_jenis' => $request->selectJenisMotor
        ];

        return view('transaksi.report', $data);
    }
}
