<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('news_id')->unsigned()->nullable();
            $table->string('locale', 2);
            $table->string('slug', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->longText('text')->nullable();

            $table->unique(['news_id', 'locale']);
            $table->unique(['locale', 'name']);
            $table->index('news_id');
            $table->index('locale');

            $table->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_translations');
    }
}
