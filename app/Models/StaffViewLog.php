<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffViewLog extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['staff_log_id, circular_id'];

    public function staff_log() : ?BelongsTo{
        return $this->belongsTo(StaffLog::class,'staff_log_id');
    }

    public function circular() : ?BelongsTo{
        return $this->belongsTo(Circular::class,'circular_id');
    }

    
}
