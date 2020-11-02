<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
// use Laravel\Passport\HasApiTokens as PassportHasApiTokens;

class User extends Authenticatable
{
    # use HasApiTokens, Notifiable;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'email_verified_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * get user data to show
     *
     * @param
     * @return array
     */
    public function getUserData()
    {
        return [

            'name'=> $this->name,
            'email'=> $this->email,
            'user_id' => $this->id,
            'is_admin'=> $this->isAdmin(),




        ];
    }
    /**
     * Check User IS Admin
     * @return bool
     */
    public function isAdmin()
    {
        if ((int)$this->is_admin == 1){
            return true;
        }
        return false;
    }

    /**
     * Set User To Admin
     */
    public  function setAdmin(){
        $this->is_admin = 1;
        $this->save();

    }


    /**
     * Relation Between User And Bill Model
     * @return hasMany
     */
    public function bills(){
        return $this->hasMany(Bill::class);
    }


}
