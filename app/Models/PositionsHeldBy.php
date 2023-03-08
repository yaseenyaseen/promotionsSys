<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionsHeldBy extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'workDescriptoin',
        'workplace',
        'sDate',
        'edate'
    ];
    protected $table='degrees';

    /* public function User(){
         return $this->belongsTo(User::class);
     }*/


}
