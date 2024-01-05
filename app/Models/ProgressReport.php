<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgressReport extends Model {
    
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status',
        'remarks'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
