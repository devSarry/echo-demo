<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{

    public function up()
    {
        Schema::create('channels', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('isOpen')->default(false);
            $table->timestamps();

            // Constraints declaration

        });
    }

    public function down()
    {
        Schema::drop('channels');
    }
}
