<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'phone_no'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // User belongs to mas role
    public function masRole()
    {
        return $this->belongsTo(MasRole::class, 'role_id');
    }

    // User has one student
    public function student()
    {
        return $this->hasOne(Student::class, 'user_id');
    }

    // User has one faculty
    public function faculty()
    {
        return $this->hasOne(Faculty::class, 'user_id');
    }
}
