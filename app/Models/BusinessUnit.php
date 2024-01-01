<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessUnit extends Model {

    use HasFactory, softDeletes;

    public function projects(): HasMany {

        return $this->hasMany(Project::class);
    }
}
