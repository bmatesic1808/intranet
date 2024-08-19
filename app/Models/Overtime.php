<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hours',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function overtimeActivities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OvertimeActivity::class)->orderByDesc('created_at');
    }
}
