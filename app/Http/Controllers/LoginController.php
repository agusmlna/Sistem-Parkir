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

        // jika email tidak ditemukan di dalam database
        if (is_null($user)) {
            return back()->with('errorEmail', 'email tidak terdaftar');
        }

        if ($user->password == $password) {
            session([
                'id' => $user->id,
                'name' => $user->name,
                'role' => $user->role
            ]);

            return redirect('/dashboard');
        } else {
            return back()->with('errorPassword', 'password salah');
        }
        // // user login untuk owner
        // if ($user->role == 'admin') {
        //     // jika possword benar
        // }

        // // user login untuk pegawai
        // if ($user->role_id == 2) {
        //     // jika possword benar
        //     if ($user->password == $password) {
        //         $data = [
        //             'id' => $user->id,
        //             'email' => $user->email,
        //         ];

        //         return redirect('/dashboard');
        //     } else {
        //         return back()->with('errorPassword', 'password salah');
        //     }
        // }
    }

    function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
