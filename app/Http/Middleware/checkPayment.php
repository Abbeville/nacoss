<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\PaymentController as Payment;
use Session;

class checkPayment
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
        if (auth()->user()->type == config('type.roles.member')) {

           if (!Payment::status(auth()->user())) {
               Session::flash('info', 'Please make payment before you can complete your profile <a href="/payment-page" class="btn btn-md btn-outline-primary" type="button">Make Payment</a>');

               return redirect()->route('dashboard.home');
           }
        }
        return $next($request);
    }
}
