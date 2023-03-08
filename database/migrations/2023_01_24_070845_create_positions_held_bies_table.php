<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsHeldBiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions_held_bies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('workDescriptoin')->nullable();
            $table->string('workplace')->nullable();
            $table->timestamp('sDate')->nullable();
            $table->timestamp('edate')->nullable();
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
        Schema::dropIfExists('positions_held_bies');
    }
}
