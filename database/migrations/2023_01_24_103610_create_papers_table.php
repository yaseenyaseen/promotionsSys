<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            //add table columns
          //  $table->integer('user_id')->nullable();
            $table->integer('promotionReqs_id')->nullable();

            $table->string('paper_title')->nullable();
            $table->timestamp('publish_date')->nullable();
            $table->boolean('singleAuther')->nullable();
            $table->boolean('Ispubished')->nullable();
            $table->boolean('takenFromStdut_thesis')->nullable();
            $table->string('publishType')->nullable();
            $table->boolean('exact_specialization')->nullable();
            $table->boolean('general_specialization')->nullable();

            $table->string('plagiarised_Details')->nullable();
            $table->integer('headCommitee_ID')->nullable();
            $table->timestamp('headCommitee_createdat')->nullable();
            //$table->string('plagiarised_Rep')->nullable();
            $table->boolean('Is_paper_fromApplTheses')->nullable();
            $table->string('plagiarised_resource')->nullable();
            $table->boolean('Is_paperRelated_CoAuther')->nullable();

            $table->boolean('Is_paper_AppSuperlTheses')->nullable();
            $table->integer('Ratio_paper_AppSuperlTheses')->nullable();
            $table->string('plagiarised_resource_Sup')->nullable();
            $table->boolean('Is_paperRelated_CoAuther_Sup')->nullable();
            $table->boolean('Is_paper_CoSuperTheses')->nullable();
            $table->integer('Ratio_paper_CoSuperTheses')->nullable();
            $table->string('plagiarised_resource_CoSuper')->nullable();
            $table->boolean('Is_paperRelated_CoSuper')->nullable();

            $table->boolean('Is_paper_CoTheses')->nullable();
            $table->integer('Ratio_paper_CoTheses')->nullable();
            $table->string('plagiarised_resource_CoTheses')->nullable();
            $table->boolean('Is_paperRelated_CoTheses')->nullable();

            $table->boolean('Is_paper_OldProm')->nullable();
            $table->integer('Ratio_paper_OldProm')->nullable();
            $table->string('plagiarised_resource_OldProm')->nullable();
            $table->boolean('Is_paperRelated_CoAuther_OldProm')->nullable();

            $table->boolean('Is_paper_From_Others')->nullable();
            $table->integer('Ratio_paper_From_Others')->nullable();
            $table->string('plagiarised_resFrom_Others')->nullable();
            $table->boolean('Is_paperRelated_CoAuther_From_Others')->nullable();

            $table->boolean('sabbaticalLeave')->nullable();
            $table->string('journalName')->nullable();
            $table->integer('journalIssueNa')->nullable();
            $table->integer('journalvolume')->nullable();

            $table->integer('totalPoints')->nullable();
            $table->integer('TableTypeAorB')->nullable();
            $table->string('ExpertEssessment1')->nullable();
            $table->string('ExpertEssessment2')->nullable();
            $table->string('ExpertEssessment3')->nullable();
            $table->string('TotalExpertEsses')->nullable();

            $table->boolean('supportedPaper')->nullable();
            $table->timestamp('suppPaper_dateof_application')->nullable();
            $table->boolean('Is_suppPaper_In_SciPlan')->nullable();
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
        Schema::dropIfExists('papers');
    }
}
