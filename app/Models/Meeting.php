<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Meeting extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'comment',
        'rating',
        'date',
    ];

    protected $dates = [
        'date'
    ];

    protected static $logAttributes = ['user.name'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "1 on 1 meeting has been {$eventName}";
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
