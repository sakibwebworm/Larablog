<?php
use App\User;
use Faker\Generator;
$factory->define(User::class, function (Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});
$factory->state(User::class, 'sakib', function (Generator $faker) {
    return [
        'name' => 'sakib',
        'email' => 'sakibwebworm@gmail.com'
    ];
});