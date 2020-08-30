<?php

use App\Specialite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialites = [
            'allergologie',
            'andrologie',
            'anesthesiologie',
            'cardiologie',
            'churigie',
            'dermatologie',
            'endrocrinologie',
            'gastro-entérologie',
            'gériatrie',
            'gynécologie',
            'hématologie',
            'hépatologie',
            'immunologie',
            'infectiologie',
            'médécine du travail',
            'médecine d\'urgence',
            'médecine générale',
            'médecine interne',
            'néonatologie',
            'néphrologie',
            'obstétrique',
            'onctologie',
            'ophtalmologie',
            'otorhinomaryngologie',
            'pédiatrie',
            'pneumologie',
            'podologie',
            'psychiatrie',
            'radiologie',
            'radiothérapie',
            'rhumatologie',
            'urologie'
        ];

        foreach ($specialites as $specialite) {
            Specialite::create([
                'nom_specialite' => $specialite
            ]);
        }
    }
}
