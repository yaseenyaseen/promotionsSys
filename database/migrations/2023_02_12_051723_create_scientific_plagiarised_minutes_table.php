<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScientificPlagiarisedMinutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_plagiarised_minutes', function (Blueprint $table) {
            $table->id();
            $table->integer('promotionReqs_id')->nullable();
            $table->integer('Administrative_Order_No')->nullable();
            $table->timestamp('Administrative_Order_date')->nullable();

            $table->string('member1_hamsh')->nullable();
            $table->integer('member1_ID')->nullable();
            $table->timestamp('member1_createdat')->nullable();

            $table->string('member2_hamsh')->nullable();
            $table->integer('member2_ID')->nullable();
            $table->timestamp('member2_createdat')->nullable();


            $table->integer('plagiarised_percentage_member1')->nullable();
            $table->integer('plagiarised_percentage_member2')->nullable();
            $table->integer('plagiarised_percentage_member3')->nullable();
            $table->integer('plagiarised_percentage_member4')->nullable();
            $table->integer('plagiarised_percentage_member5')->nullable();

            $table->string('headCommitee_hamsh')->nullable();
            $table->integer('headCommitee_ID')->nullable();
            $table->timestamp('headCommitee_createdat')->nullable();

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
        Schema::dropIfExists('scientific_plagiarised_minutes');
    }
}
