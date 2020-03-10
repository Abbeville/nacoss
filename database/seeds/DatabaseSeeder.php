<?php

use Illuminate\Database\Seeder;
use App\Programme;
use App\Level;
use App\Fee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Programme::truncate();
        Level::truncate();
        Fee::truncate();

        // $this->call(UsersTableSeeder::class);
        $this->call(FeesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(ProgrammesTableSeeder::class);
    }
}
