<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    public function role() : ?BelongsTo{
        return $this->belongsTo(Role::class,'role_id');
    }

    public function staff_logs() : ?HasMany {
        return $this->hasMany(StaffLog::class);
    }
}
