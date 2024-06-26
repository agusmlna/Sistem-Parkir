<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::leftJoin('motors', 'transactions.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('transactions.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->get();

        $data = [
            'title' => 'Report',
            'dataMotor' => $transaction,
            'start_date' => null,
            'end_date' => null
        ];

        return view('dashboard.report', $data);
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
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }

    public function filterDate(Request $request)
    {

        $startDate = date("Y-m-d H:i:s", strtotime($request->startDate));
        // dd($startDate);
        $endDate = date("Y-m-d H:i:s", strtotime($request->endDate));

        $transaction = Transaction::leftJoin('motors', 'transactions.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('transactions.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->whereBetween('transactions.created_at', [$startDate, $endDate])
            ->get();

        $data = [
            'title' => 'Report',
            'dataMotor' => $transaction,
            'start_date' => $startDate,
            'end_date' => $endDate
        ];

        return view('dashboard.report', $data);
    }

    public function filterJenis(Request $request)
    {
        $transaction = Transaction::leftJoin('motors', 'transactions.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('transactions.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->where('jenis_motors.id', '=', $request->selectJenisMotor)
            ->get();

        $data = [
            'title' => 'Report',
            'dataMotor' => $transaction,
            'start_date' => null,
            'end_date' => null
        ];

        return view('dashboard.report', $data);
    }
}
