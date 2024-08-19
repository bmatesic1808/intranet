<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PersonalInformation extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'personal_informations';

    protected $fillable = [
        'user_id',
        'country',
        'city',
        'address',
        'postal',
        'phone',
        'birthday',
        'employment_date',
        'employment_type',
    ];

    protected $dates = [
        'birthday' => 'date:d.m.Y',
        'employment_date' => 'date:d.m.Y',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected static $logAttributes = ['user.name'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Personal information on profile has been {$eventName}";
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
