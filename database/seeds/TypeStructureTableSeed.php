<?php

use App\TypeStructure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeStructureTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_structures = [
            "prive",
            "public",
            "chu",
            "hôpital général",
            "Espc",
            "dispensaire",
            "infirmerie",
            "centre de médecine douce",
            "centre de kinésithérapie"
        ];

        foreach($type_structures as $type)
        {
            TypeStructure::create([
                'nom' => $type
            ]);
        }
    }
}
