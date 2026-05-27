<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    protected $fillable = [

        'class_id',

        'subject_id',

        'topic',

        'file_url'
    ];

    /*
    |--------------------------------------------------------------------------
    | NOTE BELONGS TO CLASS
    |--------------------------------------------------------------------------
    */

    public function class()
    {
        return $this->belongsTo(

            ClassModel::class,

            'class_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | NOTE BELONGS TO SUBJECT
    |--------------------------------------------------------------------------
    */

    public function subject()
    {
        return $this->belongsTo(

            Subject::class,

            'subject_id'
        );
    }
}