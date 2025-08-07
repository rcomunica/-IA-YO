<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Results extends Model
{
    public function register(): BelongsTo
    {
        return $this->belongsTo(Register::class);
    }
}
