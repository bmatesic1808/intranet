<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'absence_id',
        'date',
        'color',
    ];

    protected $dates = [
        'date',
    ];

    public function absence(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Absence::class)->with('user');
    }
}
