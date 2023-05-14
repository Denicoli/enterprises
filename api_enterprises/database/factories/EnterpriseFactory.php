<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Enterprise;
use App\Models\User;
use Faker\Generator as Faker;
use Faker\Provider\en_US\Company as Company;

$factory->define(Enterprise::class, function (Faker $faker) {
    $faker->addProvider(new Company($faker));

    return [
        'enterprise_name' => $faker->company,
        'description' => $faker->bs,
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'city' => $faker->city,
    ];
});
