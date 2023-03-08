<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoAuther extends Model
{
    use HasFactory;
    protected $table='co_authers';
    protected $fillable = [
        'id',
        'papers_id',
        'autherName',
        'order'

        //end of add table columns


    ];


}
