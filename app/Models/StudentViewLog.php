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

    protected $hidden = ['deleted_at'];

    public function student_log() : ?BelongsTo{
        return $this->belongsTo(StudentLog::class,'student_log_id');
    }

    public function circular() : ?BelongsTo{
        return $this->belongsTo(Circular::class,'circular_id');
    }

    public function userscreate() : ?BelongsTo{
        return $this->belongsTo(User::class,'created_by_id');
    }

    public function usersupdate() : ?BelongsTo{
        return $this->belongsTo(User::class,'updated_by_id');
    }

    public function usersdelete() : ?BelongsTo{
        return $this->belongsTo(User::class,'deleted_by_id');
    }
}
