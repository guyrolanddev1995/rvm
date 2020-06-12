<?php

use App\Specialite;
use App\Structure;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Structure::class, 10)->create();
        factory(Specialite::class, 10)->create();
    }
}
