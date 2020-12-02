<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Diary;
use Faker\Generator as Faker;

$factory->define(Diary::class, function (Faker $faker) {
    for($index = 1 ; $index < 7; $index++){
    Diary::create([
        'date' => '2020/12/' . $index,
        'walk' => $faker->numberBetween($min = 200, $max = 2500),
        'sleep' => $faker->numberBetween($min = 1, $max = 12) .':00',
        'patient_id' => 7
        ]);
    }
    return [
        'date' => '2020/12/' . $index,
        'walk' => $faker->numberBetween($min = 200, $max = 2500),
        'sleep' => $faker->numberBetween($min = 1, $max = 12) .':00',
        'patient_id' => 7
    ] ;
});
