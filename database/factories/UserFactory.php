<?php
use App\User;
use Faker\Generator;
$factory->define(User::class, function (Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'img_path'=>$faker->imageUrl($width=640, $height=480, 'cats', true, 'Faker'),
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