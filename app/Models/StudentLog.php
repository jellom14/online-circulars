<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentLog extends Model
{
    use HasFactory, SoftDeletes;

    public function student() : ?BelongsTo{
        return $this->belongsTo(Student::class,'student_id');
    }

    public function student_view_logs() : ?HasMany {
        return $this->hasMany(StudentViewLog::class);
    }


}

