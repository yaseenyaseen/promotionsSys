<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificPlagiarisedMinute extends Model
{
    use HasFactory;

    protected $table='scientific_plagiarised_minutes';
    protected $fillable = [
        'id',
        'promotionReqs_id',
  'Administrative_Order_No',
'Administrative_Order_date',

  'member1_hamsh',
  'member1_ID',
  'member1_createdat',

  'member2_hamsh',
  'member2_ID',
  'member2_createdat',

  'plagiarised_percentage_member1',
  'plagiarised_percentage_member2',
  'plagiarised_percentage_member3',
  'plagiarised_percentage_member4',
  'plagiarised_percentage_member5',

  'headCommitee_hamsh',
  'headCommitee_ID',
  'headCommitee_createdat'
        //end of add table columns
    ];
}
