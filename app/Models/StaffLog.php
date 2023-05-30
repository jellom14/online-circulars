<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id'];

    public function staff() : ?BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }

    public function staff_view_logs() : ?HasMany {
        return $this->hasMany(StaffViewLog::class);
    }

}
