<?php

namespace App\Http\Controllers\Lib;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use Session;
use Auth;

use Rave;

class RaveController extends Controller
{

  /**
   * Initialize Rave payment process
   * @return void
   */
  public function initialize(Request $request)
  {

     Transaction::create([
        'user_id' => auth()->id(),
        'amount' => $request->amount,
        'fee_code' => $request->paymentcode,
        'txref' => $request->ref,
        'status' => 'pending',
        'currency' => 'NGN'
     ]);

    Rave::initialize(route('callback'));
  }

  /**
   * Obtain Rave callback information
   * @return void
   */
  public function callback()
  {

    $res = Rave::verifyTransaction(request()->txref);

    $transaction = Transaction::where('txref', request()->txref)->first();

    if (request()->cancelled) {
      $transaction->status = 'failed';

      $transaction->save();

      Session::flash('danger', '<strong>ERROR:</strong> Payment not Completed.');
      return redirect()->route('dashboard.home');
    }else{

        $amount = $transaction->amount;
        $currency = $transaction->currency;

        if ($transaction->status == 'success') {
          Session::flash('success', 'Payment successful');
          return redirect()->route('dashboard.home');
        }else{
            $data = $res->data;

          if ($res->status == 'success' && $data->chargecode == 00 || $data->chargecode == 0 && $data->currency == $currency && $data->amount) {

            $transaction->status = 'success';
            $transaction->chargecode = $data->chargecode;

            $transaction->save();

            $user = Auth::user();

            $user->payment_status = 1;

            $user->save();

            Session::flash('success', 'Payment successful! <a href="/profile">Please Upload your Passport for ID card collection.</a>');
            return redirect()->route('dashboard.home');

          }else{

            $transaction->status = 'failed';
            $transaction->chargecode = $data->chargecode;

            $transaction->save();

            Session::flash('error', 'Transaction Failed! <a href="/profile">Please Upload your Passport for ID card collection.</a>');
            return redirect()->route('dashboard.home');
          }

        }
    }
  }
}