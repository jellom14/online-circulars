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
    
    protected $fillable = ['last_name', 'first_name', 'middle_name', 'username', 'email', 'role_id', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];

    public function role() : ?BelongsTo{
        return $this->belongsTo(Role::class,'role_id');
    }

    public function staff_logs() : ?HasMany {
        return $this->hasMany(StaffLog::class);
    }
}
