<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;


class HomeController extends Controller
{
    public function index(){
    	$user = Auth::user();
    	return view('dashboard.profile.home', compact('user'));
    }

    public function update(Request $request){

    	$request->validate([
            'mobile' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatarName = '_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        // $request->avatar->storeAs('avatars', $avatarName);
        $avatar = $request->avatar;

        $avatar->move('uploads', $avatarName);

    	$user = Auth::user();

        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->avatar = $avatarName;

        $user->save();

        Session::flash('success', 'Profile updated successfully!');

        return redirect()->route('dashboard.profile');
    }
}
