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
         array('code' => 'PYMT-ND', 'amount' => 2500),
         array('code' => 'PYMT-HND', 'amount' => 1500),
      );
        
        foreach($fees as $fee){
            DB::table('fees')->insert($fee);
        }

    }
}
