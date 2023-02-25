<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    use HasFactory;
    protected $fillable = [
                        'subject_id',
                        'subject_name',
                        'section',
                        'class_id',

    ];

}
