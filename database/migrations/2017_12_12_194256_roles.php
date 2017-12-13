<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        //insert roles in table if the table is empty
        DB::table('roles')->insert(
            array(
                ['id' => 1,
                    'name' => 'admin','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],['id' => 2,
                'name' => 'editor','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]
            )
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
