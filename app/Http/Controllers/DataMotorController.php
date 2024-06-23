<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Detail Data Produk',
            'dataMotor' => Motor::where('status', 'diproses')->get(),
        ];

        return view('dashboard.datamotor', $data);
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
    public function show(Motor $motor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motor $motor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //upload image
        $image = $request->file('bukti-bayar');
        $image->storeAs('public/images', $image->hashName());

        Motor::where('id', $id)
            ->update([
                'bukti_bayar' => $image->hashName(),
                'status' => 'selesai',
                'jam_keluar' => Carbon::now(),
            ]);
        return redirect('/datamotor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motor $motor)
    {
        //
    }

    // public function saveBuktiBayar($id, Request $request)
    // {
    //     //upload image
    //     $image = $request->file('image');
    //     $image->storeAs('public/images', $image->hashName());

    //     Motor::where('id', $id)
    //         ->update([
    //             'bukti_bayar' => $image->hashName(),
    //             'status' => 'selesai'
    //         ]);
    // }

    public function komplain($id, Request $request)
    {
        Motor::where('id', $id)
            ->update([
                'komplain' => $request->komplain,
            ]);
        return redirect('/datamotor');
    }
}
