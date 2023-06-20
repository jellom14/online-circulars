<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Circular extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'category_id', 'number', 'date'];

    protected $hidden=['deleted_at'];

    public function category() : ?BelongsTo{
        return $this->belongsTo(Category::class,'category_id');
    }

    public function users() : ?BelongsTo{
        return $this->belongsTo(User::class,'user_id');
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

    public function circular_attachments() : ?HasMany {
        return $this->hasMany(CircularAttachment::class,'circular_id');
    }

    public function staff_view_logs() : ?HasMany {
        return $this->hasMany(StaffViewLog::class);
    }

    public function student_view_logs() : ?HasMany {
        return $this->hasMany(StaffViewLog::class);
    }

    //Circulars::with(['category'])
    //Category::with('circulars')
  
}
