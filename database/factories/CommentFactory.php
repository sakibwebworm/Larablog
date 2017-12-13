<?php
use App\Comment;
use App\Post;
use App\User;
use Faker\Generator;
use Carbon\Carbon;

$factory->define(Comment::class, function (Generator $faker) {
    return [
        'content' => $faker->paragraph,
        'author_id' => function () {
            return rand(1,count( App\User::all()));
        },
        'post_id' => function () {
             return rand(1,count( App\Post::all()));
        },
        'posted_at' => Carbon::now()
    ];
});