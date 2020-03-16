<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class ManualPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $matric = $user->matric;
        $paid_students = config('payment.students');

        // dd(gettype($paid_students));

        if(array_key_exists($matric, $paid_students)){
            $user->payment_status = 1;
            $user->manual = 1;
            $user->save();

            Session::flash('info', 'The system found out you have paid manually to the bank. Please proceed to completing your profile.');
        }
        return $next($request);
    }
}
