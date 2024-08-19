<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'last_month_score',
        'bad_experiences',
        'good_experiences',
        'job_improvement',
        'biggest_win',
        'nextmonth_goal',
        'goal_blocker',
        'month_education',
        'ceo_help',
        'ceo_question',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
