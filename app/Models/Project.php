<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model {

    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    public function progressReports(): HasMany {

        return $this->hasMany(ProgressReport::class);
    }

    public function businessUnit(): BelongsTo {

        return $this->belongsTo(BusinessUnit::class, 'bu_id');
    }

    public function users(): BelongsToMany {
        
        return $this->belongsToMany(User::class, 'project_user');
    }
}
