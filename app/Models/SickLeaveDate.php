<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SickLeaveDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'sick_leave_id',
        'date',
        'color',
    ];

    protected $dates = [
        'date',
    ];

    public function sickLeave(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SickLeave::class)->with('user');
    }
}
