<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++)
        {
            DB::table('examins')->insert([
                'nom' => "Examin $i"
            ]);
        }
    }
}
