<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSciPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sci_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('promotionReqs_id')->nullable();

            $table->string('Applicant_hamsh')->nullable();
            $table->integer('Applicant_Id')->nullable();
            $table->timestamp('Applicant_createdAt')->nullable();

            $table->string('Sci_Dep_hamsh')->nullable();
            $table->integer('Sci_Dep_Id')->nullable();
            $table->timestamp('Sci_Dep_createdAt')->nullable();

            $table->string('official_hamsh')->nullable();
            $table->integer('official_Id')->nullable();
            $table->timestamp('official_createdAt')->nullable();
            $table->integer('LastUpdatedYear')->nullable();

            $table->string('Dean_Assis_hamsh')->nullable();
            $table->integer('Dean_Assis_Id')->nullable();
            $table->timestamp('Dean_Assis_createdAt')->nullable();

            $table->string('presidency_official_hamsh')->nullable();
            $table->integer('presidency_official_Id')->nullable();
            $table->timestamp('presidency_official_createdAt')->nullable();

            $table->string('presidency_SciAffairsDir_hamsh')->nullable();
            $table->integer('presidency_SciAffairsDir_Id')->nullable();
            $table->timestamp('presidency_SciAffairsDir_createdAt')->nullable();

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
        Schema::dropIfExists('sci_plans');
    }
}
