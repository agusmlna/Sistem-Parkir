<?php

namespace App\Http\Controllers;

use App\Models\DataMotor;
use Illuminate\Http\Request;

class DataMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.datamotor');
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
    public function show(DataMotor $dataMotor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataMotor $dataMotor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataMotor $dataMotor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataMotor $dataMotor)
    {
        //
    }
}
