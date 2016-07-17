<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTaxonomyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_taxonomy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->index();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('taxonomy_id')->unsigned()->index();
            $table->foreign('taxonomy_id')->references('id')->on('taxonomies')->onDelete('cascade');
            $table->primary(['post_id', 'taxonomy_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_taxonomy');
    }
}
