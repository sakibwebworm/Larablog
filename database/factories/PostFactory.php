<?php
use App\Post;
use App\User;
use Carbon\Carbon;
use Faker\Generator;
$factory->define(Post::class, function (Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'image_path'=>$faker->imageUrl($width=640, $height=480, 'cats', true, 'Faker') ,
        'user_id' => rand(1,10)
    ];
});