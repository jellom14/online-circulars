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

    protected $hidden = ['deleted_at'];

    public function staff() : ?BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }

    public function staff_view_logs() : ?HasMany {
        return $this->hasMany(StaffViewLog::class);
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
