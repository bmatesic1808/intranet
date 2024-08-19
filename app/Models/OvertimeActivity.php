<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OvertimeActivity extends Model
{
    protected $fillable = [
        'overtime_id',
        'hours',
        'comments',
    ];

    public function overtime(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Overtime::class);
    }
}
