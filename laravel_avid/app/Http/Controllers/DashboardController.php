<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;
use App\Model\User;

class DashboardController extends Controller {
	public function index(Request $request) {
        $userinfo = session('userinfo');

        return view ('dashboard');
    }

}
