<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'created_at', 'updated_at', 'created_at'];
    
    public function staff() : ?HasMany {
        return $this->hasMany(Staff::class);
    }
    
}
