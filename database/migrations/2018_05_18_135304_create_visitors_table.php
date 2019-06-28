<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session', 40);
            $table->string('platform', 29);
            $table->string('browser', 29);
            $table->string('version', 19);
            $table->string('ip', 15);
            $table->timestamp('created_at');
            $table->timestamp('visited_at')->nullable();

            $table->unique(['session', 'platform', 'browser', 'version', 'ip', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
