<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class These extends Model
{
    use HasFactory;
    protected $table='theses';
    protected $fillable = [
        'id',
        'promotionReqs_id',

        'title',
        'autherName',
        'supervisorName',
        'degree',
        'No_plagiarised_articles'
        //end of add table columns


    ];
}
