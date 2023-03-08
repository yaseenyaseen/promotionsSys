<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificCommittee_minute extends Model
{
    use HasFactory;
    protected $table='scientific_committee_minutes';
    protected $fillable = [
        'id',
        'promotionReqs_id',
      'member1_hamsh',
  'member1_ID',
  'member1_createdat',

  'member2_hamsh',
  'member2_ID',
  'member2_createdat',

  'member3_hamsh',
  'member3_ID',
  'member3_createdat',

  'member4_hamsh',
  'member4_ID',
  'member4_createdat',

  'headCommitee_hamsh',
  'headCommitee_ID',
  'headCommitee_createdat',
  'Is_Articles_Specfic',
  'Is_Articles_SciSpecilist',
  'Is_published_Solid',
  'table2_ratification',
  'plagiarised_Rep_ratification'
        //end of add table columns
    ];
}
