<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScientificCommitteeMinutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_committee_minutes', function (Blueprint $table) {
            $table->id();
            $table->integer('promotionReqs_id')->nullable();

            $table->string('member1_hamsh')->nullable();
            $table->integer('member1_ID')->nullable();
            $table->timestamp('member1_createdat')->nullable();

            $table->string('member2_hamsh')->nullable();
            $table->integer('member2_ID')->nullable();
            $table->timestamp('member2_createdat')->nullable();

            $table->string('member3_hamsh')->nullable();
            $table->integer('member3_ID')->nullable();
            $table->timestamp('member3_createdat')->nullable();

            $table->string('member4_hamsh')->nullable();
            $table->integer('member4_ID')->nullable();
            $table->timestamp('member4_createdat')->nullable();

            $table->string('headCommitee_hamsh')->nullable();
            $table->integer('headCommitee_ID')->nullable();
            $table->timestamp('headCommitee_createdat')->nullable();

            $table->boolean('Is_Articles_Specfic')->nullable();
            $table->boolean('Is_Articles_SciSpecilist')->nullable();
            $table->boolean('Is_published_Solid')->nullable();

            $table->string('table2_ratification')->nullable();
            $table->string('plagiarised_Rep_ratification')->nullable();

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
        Schema::dropIfExists('scientific_committee_minutes');
    }
}
