<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marks extends Model
{
    use HasFactory;


    protected $fillable = [
                        'subject_id',
                        'class_id',
                        'student_id',
                        'marks',
                        'subject',
                        'studentName',
                        'terminalTypes',
                        'terminal_id',
                        
    ];
}
 // <option>Terminal Exam</option>
 //                   @if(!empty($terminal_types))
 //                    @foreach($terminal_types as $terminalType) 
 //                        <option value="">{{$terminalType->terminalTypes}}</option>
 //                    @endforeach  
 //                 @endif 
