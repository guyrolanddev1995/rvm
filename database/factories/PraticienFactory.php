<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Praticien;
use Faker\Generator as Faker;


$factory->define(Praticien::class, function (Faker $faker) {
    $faker->addProvider(new Bluemmb\Faker\PicsumPhotosProvider($faker));
    return [
        'praticien_nom' => $faker->firstName,
        'praticien_prenom' => $faker->lastName,
        'email' => $faker->email,
        'verified' => $faker->numberBetween(0, 1),
        'praticien_date_naissance' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'praticien_sexe' => 'M',
        'praticien_numero_professionnel' => '12345678',
        'praticien_presentation' => $faker->sentence(),
        'praticien_telephone' => '68357397',
        'praticien_lieu_naissance' => 'Abidjan',
        'praticien_lieu_residence' => 'Abobo-doume',
        'password' => bcrypt('password'),
        'avatar' => $faker->imageUrl(640, 480, true),
        'praticien_status' => 'VALIDE'
    ];
});
