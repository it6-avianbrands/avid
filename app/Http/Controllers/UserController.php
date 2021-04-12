<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('Username', 'Password');

        if (Auth::attempt(['Username' => $credentials['Username'], 'password' => $credentials['Password']]))
        {
            return redirect()->route('index')->with(['message' => 'Login success']);
        }
        else
        {
            return redirect()->back()->with(['message' => 'Invalid username/password']);
        }
    }

    public function register(Request $request)
    {
        $user = UserAccount::create([
            'Username' => $request->Username,
            'Nama' => $request->Nama,
            'Password' => bcrypt($request->Password)
        ]);

        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('index')->with(['message' => 'Logout success']);
    }
}
