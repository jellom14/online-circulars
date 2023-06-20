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
    protected $fillable = ['student_id'];

    protected $hidden = ['deleted_at'];

    public function student() : ?BelongsTo{
        return $this->belongsTo(Student::class,'student_id');
    }

    public function student_view_logs() : ?HasMany {
        return $this->hasMany(StudentViewLog::class);
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

