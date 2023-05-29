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

    public function category() : ?BelongsTo{
        return $this->belongsTo(Category::class,'category_id');
    }

    public function circular_attachments() : ?HasMany {
        return $this->hasMany(CircularAttachment::class);
    }

    public function staff_view_logs() : ?HasMany {
        return $this->hasMany(StaffViewLog::class);
    }

    //Circulars::with(['category'])
    //Category::with('circulars')

}
