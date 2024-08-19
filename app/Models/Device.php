<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'serial_number',
        'inventory_number',
        'charged',
    ];

    public function charge(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Charge::class);
    }
}
