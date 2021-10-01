<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'matricule',
        'nom',
        'prenom',
        'email',
        'tel',
        'adresse',
        'photo',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
     * The attributes that should be cast to native types.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role');
    }

    public function conges()
    {
        return $this->hasMany(Conge::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'user_services');
    }

    public function affectation()
    {
        return $this->belongsToMany(User_service::class);
    }
}
