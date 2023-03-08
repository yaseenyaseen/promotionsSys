<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'degree',
        'specialist',
        'university',
        'country'
    ];
    protected $table='degrees';

    /* public function User(){
         return $this->belongsTo(User::class);
     }*/

}
