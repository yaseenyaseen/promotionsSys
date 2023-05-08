<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_reqs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('promotion')->nullable();// list of 4 elements
            //below data related to table pro_application_summaries استمارة ملخص معاملة الترقية
            $table->boolean('Is_papers_CP_published')->nullable();
            $table->boolean('Is_papers_In_SciPlan')->nullable();
            $table->integer('performance_assessment')->nullable();
            $table->boolean('IsApplicant_PG')->nullable();
            $table->timestamp('Date_PG_start')->nullable();
            $table->boolean('IsDeserve_dues')->nullable();
            $table->integer('dues_period')->nullable();
            $table->timestamp('Date_placingOrder')->nullable();
            $table->timestamp('DueDate')->nullable();
//below recoreds belongs to  معلومات الترقية العلمية الحالية
            $table->timestamp('DueDate_lowest')->nullable();
            $table->timestamp('DueDate_largest')->nullable();
            $table->boolean('IsThesisUsed')->nullable();
            $table->string('Is_penalties')->nullable();
            $table->boolean('Prom_F_placingOrder')->nullable();
            $table->boolean('Prom_F_DueDate')->nullable();
            $table->boolean('Prom_F_SupPaper')->nullable();


            $table->boolean('status')->nullable();// done or not
            $table->integer('Pro_OrderNo')->nullable();
            $table->timestamp('Pro_OrderDate')->nullable();
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
        Schema::dropIfExists('promotion_reqs');
    }
}
