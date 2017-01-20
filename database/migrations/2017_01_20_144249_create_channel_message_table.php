<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelMessageTable extends Migration
{

    public function up()
    {
        Schema::create('channel_message', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('channel_id')->unsigned()->index();
            $table->integer('message_id')->unsigned()->index();
            $table->foreign('channel_id')
                ->references('id')
                ->on('channels');
            $table->foreign('message_id')
                ->references('id')
                ->on('messages');

        });
    }

    public function down()
    {
        Schema::drop('channel_message');
    }
}
