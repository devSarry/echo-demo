<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoundMojisTable extends Migration
{

    public function up()
    {
        Schema::create('sound_mojis', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->unique();
            $table->string('urlPath');
            $table->string('fileName');
            $table->integer('plays')->unsigned()->default(0);
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

        });
    }

    public function down()
    {
        Schema::drop('sound_mojis');
    }
}
