<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terminal_types extends Model
{
    use HasFactory;
    protected $fillable = [
                        'terminal_id',
                        'terminalType',
                        
    ];
}
