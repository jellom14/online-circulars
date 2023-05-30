<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CircularAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'circular_id', 'number', 'date'];

    public function circular() : ?BelongsTo{
        return $this->belongsTo(circular::class,'circular_id');
    }
}
