<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Measurement;
use Faker\Generator as Faker;

$factory->define(Measurement::class, function (Faker $faker) {
    for($index = 1 ; $index < 7; $index++){
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T01:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T02:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T03:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T04:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T05:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T06:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T07:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T08:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T09:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T10:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T11:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T12:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T13:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T14:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T15:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T16:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T17:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T18:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T19:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T20:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T21:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T22:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T23:00',

        ]);
        Measurement::create([
            'temperature' => $faker->numberBetween($min = 35, $max = 42),
            'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
            'arterial_frequency' => '120/80',
            'patient_id' => 1,
            'time' => '2020-12-' . $index . 'T00:00',

        ]);

    }
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T01:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T02:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T03:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T04:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T05:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T06:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T07:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T08:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T09:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T10:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T11:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T12:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T13:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T14:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T15:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T16:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T17:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T18:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T19:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T20:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T21:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T22:00',
    ]);
    Measurement::create([
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T23:00',
    ]);

    return [
        'temperature' => $faker->numberBetween($min = 35, $max = 42),
        'heart_rate' => $faker->numberBetween($min = 50, $max = 120),
        'arterial_frequency' => '120/80',
        'patient_id' => 1,
        'time' => '2020-12-' . $index . 'T00:00',
    ];
});
