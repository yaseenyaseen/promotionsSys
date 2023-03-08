<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicReputation extends Model
{
    use HasFactory;
    protected $table='academic_reputations';
    protected $fillable = [
        'id',
'user_id',
'GoogleScholar_ID',
'Publons_ID',
'ResearchGate_ID',
'ORCID_ID',
'No_ORCID',
'Researcher_ID',
'No_Researcher',
'Applicant_page',

'Applicant_hamsh',
'Applicant_Id',
'Applicant_createdAt',

'computerCenter_hamsh',
'computerCenter_Id',
'computerCenter_createdAt',

'autherName',
'supervisorName',
'degree',// الدرجة العلمية
'No_plagiarised_articles'
    //end of add table columns


    ];
}
