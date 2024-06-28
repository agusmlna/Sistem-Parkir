<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [ 
            'merek' => Merek::all(),
        ];
        return view('dashboard.merek', $data);
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
        Merek::create([
            'merek' => $request->inputMerek, 
        ]);

        return redirect('/merek-motor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merek $merek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merek $merek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merek $merek)
    {
        //
    }
}
