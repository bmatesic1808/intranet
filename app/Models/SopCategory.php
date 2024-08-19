<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SopCategory extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected static $logAttributes = ['name'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "SOP Category has been {$eventName}";
    }

    public function sops(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Sop::class)->orderByDesc('created_at');
    }
}
