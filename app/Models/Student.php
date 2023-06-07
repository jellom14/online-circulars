<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = ['last_name', 'first_name', 'middle_name', 'username', 'email', 'password'];

    public function userscreate() : ?BelongsTo{
        return $this->belongsTo(User::class,'created_by_id');
    }

    public function usersupdate() : ?BelongsTo{
        return $this->belongsTo(User::class,'updated_by_id');
    }

    public function usersdelete() : ?BelongsTo{
        return $this->belongsTo(User::class,'deleted_by_id');
    }

    public function student_logs() : ?HasMany {
        return $this->hasMany(StudentLog::class);
    }
    
    
/*
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}


