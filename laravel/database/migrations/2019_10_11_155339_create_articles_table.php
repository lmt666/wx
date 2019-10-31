<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Title');
            $table->text('Content');
            $table->date('PublishDate');
            $table->string('OpenID');
            $table->string('PublisherName');
            $table->string('PublisherAvatar');
            $table->boolean('isAudited');
            $table->boolean('isAnonymous');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
