<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'faculty_id',
        'subject_id',
        'name',
        'class_link',
        'class_date',
        'start_time',
        'end_time'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Class belongs to faculty
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    // Class belongs to subject
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}