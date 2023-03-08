<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->integer('promotionReqs_id')->nullable();
            $table->string('expertName')->nullable();
            $table->string('scientificTitle')->nullable();
            $table->string('general_specialization')->nullable();
            $table->string('exact_specialization')->nullable();
            $table->string('workplace')->nullable();
        //end of add table columns
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
        Schema::dropIfExists('experts');
    }
}
