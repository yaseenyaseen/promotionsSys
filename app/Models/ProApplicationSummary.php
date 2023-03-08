<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProApplicationSummary extends Model
{
    use HasFactory;
    protected $table='pro_application_summaries';
    protected $fillable = [
        'id',
        'promotionReqs_id',

  'table1points',
  'table2points',

  'SciCommittee_Recmd',

 // collegePromCommittee_Recmd varchar
  'SessionNo',
  'SessionNo_Date',
  'collegePromCommi_hamsh',
  'collegePromCommi_ID',
  'collegePromCommi_createdAt',


  'collegecouncil_Recmd',
  'collegecouncil_SessNo',
  'collegecouncil_SessDate',
  'Admin_OrderNo_UniHead_comm',
  'Admin_OrderDate_UniHead_comm',

  'presidencyPromCommi_hamsh',
  'presidencyPromCommi_ID',
  'presidencyPromCommi_createdAt'

        //end of add table columns
    ];
}
