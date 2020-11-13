<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaction;

class HomeController extends Controller
{
    public function index(){
    	if (auth()->user()->type == config('type.roles.member')) {
	    	$transaction = Transaction::where([['status', '=', 'success'],['chargecode', '=', '00'], ['user_id', '=', auth()->id()]])->with('user')->first();

            if ($transaction) {
              $transaction->user->payment_status = 1;
              $transaction->user->save();
            }
        }

    	$data = [];
    	$data['registered'] = User::where('type', 1)->count();
    	$data['paid'] = User::where('payment_status', 1)->count();
    	$data['avatar'] = User::whereNotNull('avatar')->count();
    	$data['printed'] = User::where('print_status', 1)->count();

    	return view('dashboard.home', compact('data'));
    }
}
