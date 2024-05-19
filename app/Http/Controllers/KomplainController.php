<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use Illuminate\Http\Request;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.komplain');
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
    public function show(Komplain $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komplain $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komplain $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komplain $report)
    {
        //
    }
}
