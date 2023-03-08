<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestApplying extends Model
{
    use HasFactory;
    protected $table='request_applyings';
    protected $fillable = [
        'id',
        'promotionReqs_id',
        'Applicant_hamsh',
        'Applicant_Id',
'Applicant_createdAt',

'Sci_Dep_hamsh',
'Sci_Dep_Id',
'Sci_Dep_createdAt',

'Dean_hamsh',
'Dean_Id',
'Dean_createdAt'

        //end of add table columns
    ];

}
