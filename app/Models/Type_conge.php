<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_conge extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lib_type_conge',
        'nbjours',
    ];

    public function conges()
    {
        return $this->hasMany(Conge::class);
    }

}
