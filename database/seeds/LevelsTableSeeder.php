<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = array(
         array('name' => 'ND I', 'fee_id' => 1),
         array('name' => 'ND II', 'fee_id' => 2),
         array('name' => 'ND III', 'fee_id' => 3),
         array('name' => 'HND I', 'fee_id' => 4),
         array('name' => 'HND II', 'fee_id' => 5),
         array('name' => 'HND III', 'fee_id' => 6),
      );
        
        foreach($levels as $level){
            DB::table('levels')->insert($level);
        }

    }
}
