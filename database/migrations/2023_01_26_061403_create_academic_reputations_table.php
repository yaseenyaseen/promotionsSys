<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicReputationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_reputations', function (Blueprint $table) {
            $table->id();
            //add table columns
            $table->integer('user_id')->nullable();
            $table->string('GoogleScholar_ID')->nullable();
            $table->string('Publons_ID')->nullable();
            $table->string('ResearchGate_ID')->nullable();
            $table->string('ORCID_ID')->nullable();
            $table->integer('No_ORCID')->nullable();
            $table->string('Researcher_ID')->nullable();
            $table->integer('No_Researcher')->nullable();
            $table->boolean('Applicant_page')->nullable();

            $table->string('Applicant_hamsh')->nullable();
            $table->integer('Applicant_Id')->nullable();
            $table->timestamp('Applicant_createdAt')->nullable();

            $table->string('computerCenter_hamsh')->nullable();
            $table->integer('computerCenter_Id')->nullable();
            $table->timestamp('computerCenter_createdAt')->nullable();

            $table->string('autherName')->nullable();
            $table->string('supervisorName')->nullable();
            $table->string('degree')->nullable();// الدرجة العلمية
            $table->integer('No_plagiarised_articles')->nullable();
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
        Schema::dropIfExists('academic_reputations');
    }
}
