<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('promotionReqs_id')->nullable();

            $table->string('Sci_Dep_hamsh')->nullable();
            $table->integer('Sci_Dep_Id')->nullable();
            $table->timestamp('Sci_Dep_createdAt')->nullable();

            $table->string('collegePromCommi_hamsh')->nullable();
            $table->integer('collegePromCommi_ID')->nullable();
            $table->timestamp('  collegePromCommi_createdAt')->nullable();

            $table->string('Dean_hamsh')->nullable();
            $table->integer('Dean_Id')->nullable();
            $table->timestamp('Dean_createdAt')->nullable();

            $table->string('collegecouncil_Recmd')->nullable();
            $table->integer('collegecouncil_SessNo')->nullable();
            $table->timestamp('collegecouncil_SessDate')->nullable();
            $table->integer('Admin_OrderNo_UniHead_comm')->nullable();
            $table->integer('Admin_OrderDate_UniHead_comm')->nullable();

            $table->string('presidencyPromCommi_hamsh')->nullable();
            $table->integer('presidencyPromCommi_ID')->nullable();
            $table->timestamp('presidencyPromCommi_createdAt')->nullable();

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
        Schema::dropIfExists('recommendations');
    }
}
