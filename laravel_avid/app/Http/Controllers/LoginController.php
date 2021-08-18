<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\Model\User;

class LoginController extends Controller {
	public function index(Request $request) {
        $userinfo = session("userinfo");
        if (isset($userinfo)){
            return redirect()->route('dashboard');
        }
		return view ('login.index');
    }

	public function check_login(Request $request) {
        $username = $request->username;
        $password = $request->password;

        $errors = new MessageBag();
        if ((trim($username) == "admin") && (trim($password) == "admin")){

            $userinfo['username'] = "admin";
            $userinfo['level'] = "0";

            session(['userinfo' => $userinfo]);
            
            return redirect()->route('dashboard');
        } else {
            $errors = new MessageBag(['credential' => ['Username and / or Password invalid.']]);
            return redirect()->route('login')->withErrors($errors)->withInput($request->except('password'));
        }
    }

    public function change_password(){
        return view ('login.change_password');
    }

    public function change_password_update(Request $request){

    }

	public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('login');
	}

}
