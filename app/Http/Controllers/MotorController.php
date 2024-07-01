<?php

namespace App\Http\Controllers;

use App\Models\JenisMotor;
use App\Models\Merek;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motor = DB::table('motors')
            ->join('mereks', 'mereks.id', '=', 'motors.id_merek')
            ->join('jenis_motors', 'jenis_motors.id', '=', 'motors.id_jenis')
            ->get();

        $data = [
            'motor' => $motor,
            'merek' => Merek::all(),
            'jenis' => JenisMotor::all()
        ];
        return view('dashboard.Motor', $data);
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
        Motor::create([
            'motor' => $request->inputNamaMotor,
            'id_merek' => $request->inputMerek,
            'id_jenis' => $request->inputJenis,
        ]);

        return redirect('/motor');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
