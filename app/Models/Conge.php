<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role_id',
        'service_id',
        'type_conge_id',
        'debut_conge',
        'fin_conge',
        'nbjrs_conge',
        'statut',
        'fiche',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type_conge()
    {
        return $this->belongsTo(Type_conge::class);
    }

}
