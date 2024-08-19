<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'month',
        'year',
        'times_rated'
    ];
}
