<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Downloadable;
use App\User;


class ImageController extends Controller
{

    
    public function download(User $user)
    {

    	$oldname = $user->download()['old-name'];
    	$newname = $user->download()['new-name'];

        $path = public_path().'/uploads/'.$oldname;

        return response()->download($path, $newname.'.jpg', ['Content-type' => 'jpg']);
    }
}
