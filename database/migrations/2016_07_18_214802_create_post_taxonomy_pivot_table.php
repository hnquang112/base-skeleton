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
            $table->integer('post_id')->unsigned()->index();
            $table->integer('post_type');
            $table->integer('taxonomy_id')->unsigned()->index();
            $table->integer('taxonomy_type');
            $table->primary(['post_id', 'taxonomy_id']);
            $table->timestamps();

            $table->foreign('taxonomy_id')->references('id')->on('taxonomies');
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_taxonomy');
    }
}
