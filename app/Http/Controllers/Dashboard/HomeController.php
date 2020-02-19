<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    public function index(){
    	$data = [];
    	$data['registered'] = User::count();
    	$data['paid'] = User::where('payment_status', 1)->count();
    	$data['avatar'] = User::whereNotNull('avatar')->count();
    	$data['printed'] = User::where('print_status', 1)->count();

    	return view('dashboard.home', compact('data'));
    }
}
