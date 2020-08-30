<?php

use App\Praticien;
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
        factory(Praticien::class, 50)->create();
        
        $this->call([
            ExamenTableSeeder::class,
            SpecialiteTableSeeder::class,
            TypeStructureTableSeed::class,
            VilleTableSeeder::class
        ]);
        
    }
}
