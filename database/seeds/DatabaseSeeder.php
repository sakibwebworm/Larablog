<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   /*cREATE FAKE DATA FOR USER,POST,COMMENT,CATEGORY*/

        factory(App\User::class,10)->create();
        factory(App\Post::class,50)->create();
        factory(App\Category::class,30)->create();
        factory(App\Comment::class,100)->create();

        /*Assign roles to each users*/

        $roles = App\Role::all();
        App\User::all()->each(function ($users) use ($roles) {
            $users->roles()->attach(
                $roles->random(rand(1, 2))->pluck('id')->toArray()
                );
        });

        /*Assign categories to each post*/

        $category=App\Category::all();
        App\Post::all()->each(function ($post) use ($category) {
            $post->categories()->attach(
                $category->random(rand(1, 2))->pluck('id')->toArray()
            );
        });

    }}