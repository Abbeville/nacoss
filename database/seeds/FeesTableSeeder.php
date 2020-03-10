<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fees = array(
         array('code' => 'PYMT-ND1', 'amount' => 2600),
         array('code' => 'PYMT-ND2', 'amount' => 1600),
         array('code' => 'PYMT-ND3', 'amount' => 1600),
         array('code' => 'PYMT-HND1', 'amount' => 2600),
         array('code' => 'PYMT-HND2', 'amount' => 1600),
         array('code' => 'PYMT-HND3', 'amount' => 1600),
      );
        
        foreach($fees as $fee){
            DB::table('fees')->insert($fee);
        }

    }
}
