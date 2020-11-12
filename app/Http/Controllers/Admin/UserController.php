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

    public function verification(){
        return view('dashboard.user.verify');
    }

    public function verify(Request $request){
        $matric = $request->matric;
        $user = User::where('matric', $matric)->first();
        
        if ($user) {
            if($user->payment_status){
                Session::flash('success', "This Student has Paid");
                return view('dashboard.payment-status', compact('user'));
            }else{
                Session::flash('error', "Yet to pay Due");
                return redirect()->back();
            }   
        }else{
            Session::flash('error', "The Matric/Form No you submitted has not been registered");
            return redirect()->back();
        }
    }
}
