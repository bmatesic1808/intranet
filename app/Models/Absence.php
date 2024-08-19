<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Absence extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'date_from',
        'date_to',
        'comment',
        'overtime',
        'reference_code',
        'approved',
    ];

    protected $casts = [
      'approved' => 'boolean',
      'overtime' => 'boolean',
    ];

    protected $dates = [
        'date_from',
        'date_to',
    ];

    protected static $logAttributes = ['user.name'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Absence period has been {$eventName}";
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function absenceDates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AbsenceDate::class)->orderByDesc('created_at');
    }
}
