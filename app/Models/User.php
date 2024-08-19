<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'name',
        'email',
        'password',
        'position',
        'signature_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected static $logAttributes = ['name', 'email', 'position'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "User has been {$eventName}";
    }

    public function personalInformation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function skill(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Skill::class);
    }

    public function metaProgram(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(MetaProgram::class);
    }

    public function performanceReviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PerformanceReview::class)->orderByDesc('created_at');
    }

    public function meetings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Meeting::class)->orderByDesc('created_at');
    }

    public function absences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Absence::class)->orderByDesc('created_at')->with('absenceDates');
    }

    public function absenceDates(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(AbsenceDate::class, Absence::class);
    }

    public function sickLeaves(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SickLeave::class)->orderByDesc('created_at')->with('sickLeaveDates');
    }

    public function sickLeaveDates(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(SickLeaveDate::class, SickLeave::class);
    }

    public function allowedAbsences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AllowedAbsence::class);
    }

    public function charges(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Charge::class)->where('date_discharged', '=', NULL)->with('device');
    }

    public function overtime(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Overtime::class);
    }

    public function points(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Point::class);
    }

    public function monthlyQuestions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MonthlyQuestion::class);
    }
}
