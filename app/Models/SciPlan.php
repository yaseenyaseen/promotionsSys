<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SciPlan extends Model
{
    use HasFactory;
    protected $table='sci_plans';
    protected $fillable = [
        'id',
        'promotionReqs_id',
'Applicant_hamsh',
'Applicant_Id',
'Applicant_createdAt',

'Sci_Dep_hamsh',
'Sci_Dep_Id',
'Sci_Dep_createdAt',

'official_hamsh',
'official_Id',
'official_createdAt',
'LastUpdatedYear',

'Dean_Assis_hamsh',
'Dean_Assis_Id',
'Dean_Assis_createdAt',

'presidency_official_hamsh',
'presidency_official_Id',
'presidency_official_createdAt',

'presidency_SciAffairsDir_hamsh',
'presidency_SciAffairsDir_Id',
'presidency_SciAffairsDir_createdAt'
        //end of add table columns
    ];
}
