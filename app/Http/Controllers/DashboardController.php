<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startDay = Carbon::now()->startOfDay();
        $endDay = Carbon::now()->endOfDay();
        $startMoth = Carbon::now()->startOfMonth();

        $laporan_harian = Parkir::join('motors', 'motors.id', '=', 'parkirs.id_motor')
            ->join('jenis_motors', 'jenis_motors.id', '=', 'motors.id_jenis')
            ->select('jenis_motors.biaya')
            ->where('parkirs.status', '=', 'selesai')
            ->whereBetween('parkirs.created_at', [$startDay, $endDay])
            ->get();

        $laporan_bulanan = Parkir::join('motors', 'motors.id', '=', 'parkirs.id_motor')
            ->join('jenis_motors', 'jenis_motors.id', '=', 'motors.id_jenis')
            ->select('jenis_motors.biaya')
            ->where('parkirs.status', '=', 'selesai')
            ->whereBetween('parkirs.created_at', [$startMoth, $endDay])
            ->get();

        $totalHarian = 0;
        foreach ($laporan_harian as $lh) {
            $totalHarian += $lh->biaya;
        }

        $totalBulanan = 0;
        foreach ($laporan_bulanan as $lh) {
            $totalBulanan += $lh->biaya;
        }


        $data = [
            'total_harian' => $totalHarian,
            'total_bulanan' => $totalBulanan,
            'total_parkir' => Parkir::count(),
            'total_pegawai' => User::count(),
            'user' => User::find(session('id')),
        ];
        return view('dashboard.index', $data);
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
    public function show($dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dashboard)
    {
        //
    }
}
