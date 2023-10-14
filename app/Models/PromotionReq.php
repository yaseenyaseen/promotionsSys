<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionReq extends Model
{
    use HasFactory;
    protected $table='promotion_reqs';
    protected $fillable = [
        'id',
        'user_id',
  'promotion',// list of 4 elements

        'Is_papers_CP_published',
        'Is_papers_In_SciPlan',
        'performance_assessment',
        'IsApplicant_PG',
        'Date_PG_start',
        'IsDeserve_dues',
        'dues_period',
        'Date_placingOrder',
        'DueDate',
        'DueDate_lowest',
        'DueDate_largest',
        'IsThesisUsed',
        'Is_penalties',
        'Prom_F_placingOrder',
        'Prom_F_DueDate',
        'Prom_F_SupPaper',

        'status', // done or not
        'Pro_OrderNo',
        'Pro_OrderDate',
        'doc_path',
'created_at'

        //end of add table columns


    ];
}
