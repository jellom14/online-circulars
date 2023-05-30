<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentViewLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['student_log_id, circular_id'];

    public function student_log() : ?BelongsTo{
        return $this->belongsTo(StudentLog::class,'student_log_id');
    }

    public function circular() : ?BelongsTo{
        return $this->belongsTo(Circular::class,'circular_id');
    }

}
