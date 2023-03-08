<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;
    protected $table='recommendations';
    protected $fillable = [
        'id',
        'promotionReqs_id',

  'Sci_Dep_hamsh',
  'Sci_Dep_Id',
  'Sci_Dep_createdAt',

  'collegePromCommi_hamsh',
  'collegePromCommi_ID',
  'collegePromCommi_createdAt',

  'Dean_hamsh',
  'Dean_Id',
  'Dean_createdAt',

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
