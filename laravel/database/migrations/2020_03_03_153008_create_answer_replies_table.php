<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('user_id');
            $table->integer('answer_id');
            $table->integer('reply_id')->nullable();
            $table->boolean('audited')->default(0);
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_replies');
    }
}
