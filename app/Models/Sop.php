<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Sop extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $fillable = [
        'sop_category_id',
        'title',
        'overview',
        'prerequisites',
        'procedure',
        'video_tutorial'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected static $logAttributes = ['title'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "SOP has been {$eventName}";
    }

    public function sopCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SopCategory::class);
    }
}
