<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $table='papers';
    protected $fillable = [
        'id',
        'user_id',
        'proreq_id',
        'paper_title',
'publish_date',
'singleAuther',
'Ispubished',
'takenFromStdut_thesis',
'publishType',
'exact_specialization',
'general_specialization',

'plagiarised_Details',
'headCommitee_ID', // لجنة استلال
'headCommitee_createdat',
'Is_paper_fromApplTheses',
'plagiarised_resource',
'Is_paperRelated_CoAuther',

'Is_paper_AppSuperlTheses',
'Ratio_paper_AppSuperlTheses',
'plagiarised_resource_Sup',
'Is_paperRelated_CoAuther_Sup',

'Is_paper_CoSuperTheses',
'Ratio_paper_CoSuperTheses',
'plagiarised_resource_CoSuper',
'Is_paperRelated_CoSuper',

'Is_paper_CoTheses',
'Ratio_paper_CoTheses',
'plagiarised_resource_CoTheses',
'Is_paperRelated_CoTheses',

'Is_paper_OldProm',
'Ratio_paper_OldProm',
'plagiarised_resource_OldProm',
'Is_paperRelated_CoAuther_OldProm',

'Is_paper_From_Others',
'Ratio_paper_From_Others',
'plagiarised_resFrom_Others',
'Is_paperRelated_CoAuther_From_Others',


'sabbaticalLeave',
'journalName',
'journalIssueNa',
'journalvolume',

'totalPoints',
'TableTypeAorB',
'ExpertEssessment1',
'ExpertEssessment2',
'ExpertEssessment3',
'TotalExpertEsses',

'supportedPaper',
'suppPaper_dateof_application',
'Is_suppPaper_In_SciPlan'

    ];
}
