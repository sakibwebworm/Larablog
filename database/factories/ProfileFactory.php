<?php

use Faker\Generator as Faker;

$factory->define(Profile::class, function (Generator $faker,$user_id) {
    return [
        //
        'about' => $faker->paragraph,
        'picture'=>$faker->imageUrl($width=640, $height=480, 'cats', true, 'Faker') ,
        'user_id' => $user_id
    ];
});
