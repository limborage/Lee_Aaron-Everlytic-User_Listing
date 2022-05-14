<?php

use Faker\Generator as Faker;
use Tests\Database\UserDatabaseTest;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->companyEmail,
        'position' => $faker->jobTitle,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
