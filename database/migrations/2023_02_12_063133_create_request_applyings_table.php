<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestApplyingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_applyings', function (Blueprint $table) {
            $table->id();

            $table->integer('promotionReqs_id')->nullable();

            $table->string('Applicant_hamsh')->nullable();
            $table->integer('Applicant_Id')->nullable();
            $table->timestamp('Applicant_createdAt')->nullable();

            $table->string('Sci_Dep_hamsh')->nullable();
            $table->integer('Sci_Dep_Id')->nullable();
            $table->timestamp('Sci_Dep_createdAt')->nullable();

            $table->string('Dean_hamsh')->nullable();
            $table->integer('Dean_Id')->nullable();
            $table->timestamp('Dean_createdAt')->nullable();

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
        Schema::dropIfExists('request_applyings');
    }
}
