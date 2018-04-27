<?php

namespace App\Console\Commands;

use App\Profile;
use Illuminate\Console\Command;
use Faker\Generator;
use App\User;
class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createadmin:user{name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create an admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //create the user from user input
        $user=new User();
        $user->name=$this->argument('name');
        $user->email=$this->argument('email');
        $user->password=bcrypt($this->argument('password'));
        $user->save();
        // attach admin role
        $user->roles()->attach(1);
        // declare a profile object
        $profile=new Profile();
        $profile->about="Edit me";
        $profile->picture="https://lorempixel.com/640/480/cats/Faker/?48114";
        $profile->user_id=$user->id;
        $profile->save();
        // The admin user has been created
        $this->info('The admin user has been created');
    }
}
