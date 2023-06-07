<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected $hidden = ['deleted_at'];

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

    public function circulars() : ?HasMany {
        return $this->hasMany(Circular::class);
    }

}
