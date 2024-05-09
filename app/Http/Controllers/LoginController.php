<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)
            ->first();

        // TODO: buat pesan ketika salah email atau password

        // user login untuk owner
        if ($user->role_id == 1) {
            // jika possword benar
            if ($user->password == $password) {
                $data = [
                    'id' => $user->id,
                    'email' => $user->email,
                ];

                return redirect('/owner');
            }
        }

        // user login untuk pegawai
        if ($user->role_id == 2) {
            // jika possword benar
            if ($user->password == $password) {
                $data = [
                    'id' => $user->id,
                    'email' => $user->email,
                ];

                return redirect('/dashboard');
            }
        }

        // if ($user->password == $password) {
        //     $data = [
        //         'id' => $user->id,
        //         'email' => $user->email,
        //     ];

        //     return redirect('/admin');
        // } else {
        //     return view('auths.signIn');
        // }
    }
}
