<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //$2y$10$eZw4YXyAhHXwlBQogueODurSJEsPzUhdhbFuZGsb1urwztRDMegXq
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_nic','user_contact_1','user_address','user_pv','image','user_gender','user_dob','user_contact_2','user_bank_name','user_bank_branch','user_account_no','user_benifit_name','user_benifit_address','user_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function orders(){
        return $this->hasMany(orders::class);
    }
}
 