<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigInteger('author_ID');
            $table->integer('category_ID')->unsigned();
            $table->longText('post_content');
            $table->text('post_title');
            $table->string('post_slug', 200);
            $table->string('post_type', 20);
            $table->string('post_thumbnail')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->foreign('category_ID')
                  ->references('id')
                  ->on('categories')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');
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
