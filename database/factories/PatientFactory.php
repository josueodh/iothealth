<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('pt_BR');
    return [
        'name' => $faker->name,
        'phone' => $faker->cellphoneNumber,
        'cep' => $faker->postcode,
        'street' => $faker->streetSuffix,
        'neighborhood' => $faker->country,
        'number' => $faker->buildingNumber,
        'city' => $faker->cityPrefix,
        'state' => $faker->state,
        'born_date' => $faker->dateTime($max = 'now', $timezone = null),
        'icd' => $faker->word,
        'pathology' => $faker->text($maxNbChars = 200),
    ];
});
