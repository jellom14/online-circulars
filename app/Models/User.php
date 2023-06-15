<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = ['last_name', 'first_name', 'middle_name', 'username', 'email', 'role_id', 'password'];

    public function role() : ?BelongsTo{
        return $this->belongsTo(Role::class,'role_id');
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
    
    public function staff_logs() : ?HasMany {
        return $this->hasMany(StaffLog::class);
    }

    public function circulars() : ?HasMany {
        return $this->hasMany(Circular::class);
    }

    public function categories() : ?HasMany {
        return $this->hasMany(Category::class);
    }

    public function students() : ?HasMany {
        return $this->hasMany(Student::class);
    }

    public function roles() : ?HasMany {
        return $this->hasMany(Role::class);
    }

    public function circular_attachments() : ?HasMany {
        return $this->hasMany(CircularAttachment::class);
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

