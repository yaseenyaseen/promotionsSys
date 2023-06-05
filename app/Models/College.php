<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    protected $table='colleges';

    protected $fillable = [
        'id',
        'college_id',
        'name',
        'department_name'
    ];

    /*public function User(){
        return $this->belongsTo(User::class);
    }*/

}
