<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Skill extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
      'user_id',
      'knowledge_expertise',
      'proactivity',
      'competency',
      'soft_skills',
      'business_bonton',
    ];

    protected static $logAttributes = ['user.name'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Skills record has been {$eventName}";
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
