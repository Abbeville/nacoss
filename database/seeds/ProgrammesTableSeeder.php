<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programmes = array(
         array('name' => 'FT'),
         array('name' => 'PT'),
         array('name' => 'DPP'),
      );
        
        foreach($programmes as $program){
            DB::table('programmes')->insert($program);
        }

    }
}
