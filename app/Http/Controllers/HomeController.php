<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Motor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.home');
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

        $motor = Motor::create([
            'motor' => $request->motor,
            'plat_nomor' => $request->platNomor,
            'properti' => $request->properti,
            'jam_masuk' => Carbon::now(),
            'tipe_motor' => $request->tipeMotor,
            'biaya' => $request->biaya,
            'status' => 'diproses',
        ]);

        return redirect()->route('struk', [$motor]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Motor $motor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $report)
    {
        //
    }
    public function struk($id)
    {

        $data = [
            'title' => 'Struk',
            'date' => date('m/d/Y'),
            'data' => Motor::where('id', $id)->first()
        ];
        return view('dashboard.struk', $data);
    }
}
