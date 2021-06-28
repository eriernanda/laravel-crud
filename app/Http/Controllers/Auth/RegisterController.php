<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view ('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|min:3|max:55',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed|min:8|max:35',
            'hak_akses'             => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'hak_akses' => $request->hak_akses
        ]);

        $reg = auth()->attempt($request->only('email', 'password'));
        $id = auth()->user()->id;
        if ($reg) {
            User::where('id', $id)
                -> update([
                    'last_login' => Carbon::now(),
                ]);
        }

        return redirect ('/barangs');
    }
}
