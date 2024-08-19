<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeoQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'understanding',
        'right_time_info',
        'company_info_sharing',
        'decisions',
        'communication',
        'focus',
        'time_management',
        'reviews',
        'employee_autonomy',
        'career',
        'employe_ideas',
        'knowledge',
        'care',
        'recommendation',
        'improvement',
    ];
}
