<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'date_affect',
    ];

   public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function service()
    {
        return $this->belongsTo(service::class);
    }
}
