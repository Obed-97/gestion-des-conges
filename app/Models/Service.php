<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ordre_service',
        'lib_service',
        'image',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_services');
    }

    public function affectation()
    {
        return $this->belongsToMany(Affecter::class);
    }

}