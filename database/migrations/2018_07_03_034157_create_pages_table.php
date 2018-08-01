<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('category_id')->unsigned();
            $table->string('title', 100);
            $table->string('slug', 150)->unique();
            $table->text('content');
            $table->enum('status', ['drafted', 'published'])->default('drafted');
            $table->timestamps();
        });

        // Schema::table('pages', function(Blueprint $table) {
        //     $table->foreign('category_id')
        //           ->references('id')
        //           ->on('categories')
        //           ->onUpdate('CASCADE')
        //           ->onDelete('CASCADE');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
