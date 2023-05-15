<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProApplicationSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_application_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('promotionReqs_id')->nullable();


            $table->integer('table1points')->nullable();
            $table->integer('table2points')->nullable();
            $table->string('SciCommittee_Recmd')->nullable();

            // collegePromCommittee_Recmd varchar
            $table->integer('SessionNo')->nullable();
            $table->timestamp('SessionNo_Date')->nullable();

            $table->string('collegePromCommi_hamsh')->nullable();
            $table->integer('collegePromCommi_ID')->nullable();
            $table->timestamp('collegePromCommi_createdAt')->nullable();

            $table->string('collegecouncil_Recmd')->nullable();
            $table->integer('collegecouncil_SessNo')->nullable();
            $table->timestamp('collegecouncil_SessDate')->nullable();

            $table->integer('Admin_OrderNo_UniHead_comm')->nullable();
            $table->timestamp('Admin_OrderDate_UniHead_comm')->nullable();

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
        Schema::dropIfExists('pro_application_summaries');
    }
}
