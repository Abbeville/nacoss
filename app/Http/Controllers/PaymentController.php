<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Payable;
use App\User;
use Auth;
use Config;

class PaymentController extends Controller
{
	public function index(){
		$user = Auth::user();

		$prefix = Config::get('rave.prefix');
		$unique = uniqid($prefix.'_');

		$txref = $unique;

		return view('dashboard.payment.home', compact('user', 'txref'));
	}

    public static function status(Payable $user){
    	return $user->paymentStatus();
    }
}
