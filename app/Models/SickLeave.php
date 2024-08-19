<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SickLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_from',
        'date_to',
        'comment'
    ];

    protected $dates = [
        'date_from',
        'date_to',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sickLeaveDates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SickLeaveDate::class)->orderByDesc('created_at');
    }
}
