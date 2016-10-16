<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->jsonb('meta')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->integer('post_id')->nullable();
            $table->integer('image_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['approved_at', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
