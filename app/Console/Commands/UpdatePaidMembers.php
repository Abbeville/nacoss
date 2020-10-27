<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;

class UpdatePaidMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'members:paid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $transactions = Transaction::where([['status', '=', 'success'],['chargecode', '=', '00']])->with('user')->get();

        foreach ($transactions as $transaction) {
            $transaction->user->payment_status = 1;

            $transaction->user->save();
        }
    }
}
