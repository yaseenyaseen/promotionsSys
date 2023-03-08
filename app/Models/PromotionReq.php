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
  'status', // done or not
  'Pro_OrderNo',
        'Pro_OrderDate',
'created_at'

        //end of add table columns


    ];
}
