<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;

class UserController extends Controller
{
    public function index(){
    	$users = User::with('level')->get();

    	return view('dashboard.user.home', compact('users'));
    }

    public function paid(){
    	$users = User::with('level')->whereNotNull('payment_status')->get();

    	return view('dashboard.user.paid', compact('users'));
    }

    public function verified(){
    	$users = User::with('level')->whereNotNull('avatar')->where('print_status',0)->get();

    	return view('dashboard.user.verified', compact('users'));
    }


    public function markAsPrinted(User $user){
        $user->print_status = 1;

        $user->save();

        Session::flash('success', "Marked Succesfully");
        return redirect()->back();
    }
}
