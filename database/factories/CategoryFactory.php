<?php
use App\Category;
use Faker\Generator;
$factory->define(Category::class, function (Generator $faker) {
    return [
        'name' => $faker->word
    ];
});