<?php

use App\Commune;
use App\Ville;
use Illuminate\Database\Seeder;

class VilleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communes = [
            'Cocody',
            'Plateau',
            'Marcory',
            'Yopougon',
            'Treichville',
            'Port-Bouet',
            'Adjamé',
            'Abobo',
            'Attécoubé',
            'Koumassi',
            'Bingerville',
            'Grand-Bassam',
            'Yamoussoukro',
            'Bouaké',
            'Daloa',
            'Bouaflé',
            'Man',
            'Korhogo',
            'Abengourou',
            'Gagnoa'
        ];

        $villes = [
            'Abidjan',
            "Bouake",
            "Daloa",
            "Yamoussokro",
            "Divo",
            "Korhogo",
            "Anyama",
            "Abengourou",
            "Man",
            "Gagnoa",
            "Soubré",
            "Agboville",
            "Dabou",
            "Grand-Bassam",
            "Bouaflé",
            "Issia",
            "Sinfra",
            "Katiola",
            "Adzopé",
            "Séguéla",
            "Bondoukou",
            "Oumé",
            "Ferkessedougou",
            "Dimbokro1",
            "Odienné",
            "Duékoué",
            "Danané",
            "Tingréla",
            "Guiglo",
            "Boundiali",
            "Agnibilékrou",
            "Daoukro",
            "Vavoua",
            "Zuénoula",
            "Tiassalé",
            "Toumodi",
            "Akoupé",
            "Lakota"
        ];

        foreach ($communes as $commune) {
           Commune::create([
               'nom' => $commune
           ]);
        }

        foreach ($villes as $ville) {
            Ville::create([
                'nom' => $ville
            ]);
         }
    }
}
