<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class These extends Model
{
    use HasFactory;
    protected $table='experts';
    protected $fillable = [
        'id',
        'promotionReqs_id',

        'expertName',
        'scientificTitle',
        'general_specialization',
        'exact_specialization',
        'workplace'
        //end of add table columns
    ];
}
