<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->string('title');
            $table->longText('content');
            $table->integer('user_id');
            $table->string('slug');
            $table->integer('represent_image_id')->nullable();
            $table->jsonb('meta')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('featured_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->index(['title', 'content', 'slug', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
