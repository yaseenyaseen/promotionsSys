<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

/*            start edit users table */
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            /*            End edit users table */

/*            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('college_id')->nullable();
            $table->string('password');*/
            $table->integer('college_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('position')->nullable();
            $table->string('currentPromotion')->nullable();
            $table->timestamp('currentPromotionDoI')->nullable();
            $table->string('general_specialization')->nullable();
            $table->string('exact_specialization')->nullable();
/*            $table->boolean('Is_papers_CP_published')->nullable();*/
  /*          $table->integer('performance_assessment')->nullable();
            $table->boolean('Is_papers_In_SciPlan')->nullable();*/
            $table->boolean('Is_pass_Educational_Qualification')->nullable();

            $table->timestamp('Date_Educational_Qualification')->nullable();
            $table->integer('Order_No_Educational_Qualification')->nullable();

            $table->boolean('Is_pass_Computing')->nullable();
            $table->integer('Order_No_Computing')->nullable();
            $table->timestamp('Date_Computing')->nullable();

            $table->timestamp('Date_hire')->nullable();
            $table->timestamp('College_SD_hire')->nullable();
          /*  $table->timestamp('Date_placingOrder')->nullable();
            $table->timestamp('DueDate')->nullable();*/
            $table->integer('mobileNumber')->nullable();

         /*   $table->timestamp('DueDate_lowest')->nullable();
            $table->timestamp('DueDate_largest')->nullable();
          */
/*            $table->boolean('IsThesisUsed')->nullable();*/
          /*  $table->string('Is_penalties')->nullable();
            $table->boolean('Prom_F_placingOrder')->nullable();
            $table->boolean('Prom_F_DueDate')->nullable();
            $table->boolean('Prom_F_SupPaper')->nullable();*/
            // end of added variables in users table.
/*            $table->rememberToken();*/
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
        Schema::dropIfExists('users');

    }
}
