<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'email',
        'college_id',
        'department_id',
        'position',
        'currentPromotion',
        'currentPromotionDoI',
        'general_specialization',
        'exact_specialization',
        'Is_pass_Educational_Qualification',
        'Date_Educational_Qualification',
        'Order_No_Educational_Qualification',
        'Is_pass_Computing',
        'Order_No_Computing',
        'Date_Computing',
        'Date_hire',
        'College_SD_hire',
        'mobileNumber',

        'password',
        'Is_pass_Educational_Qualification'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   /* public function college(){
        return $this->belongsTo(College::class);
    }*/

    /*public function proreq(){
        return $this->hasMany(Proreq::class);
    }*/
    /*public function Degree(){
        return $this->hasMany(Degree::class);
    }*/
    public function degree(){
        return $this->belongsTo(Degree::class);
    }
    public function positionsHeldBy(){
        return $this->belongsTo(PositionsHeldBy::class);
    }
/*
    public function college(): HasOne
    {
        return $this->hasOne(College::class, 'user_id');
    }
*/

}
