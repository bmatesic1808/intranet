<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class MetaProgram extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'motivation_reason',
        'reference_frame',
        'activity_mode',
        'activity_style',
        'activity_scope',
    ];

    protected static $logAttributes = ['user.name'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Meta program has been {$eventName}";
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
