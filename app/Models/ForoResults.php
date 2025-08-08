<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForoResults extends Model
{
    use HasFactory;

    public function register(): BelongsTo
    {
        return $this->belongsTo(Register::class);
    }
}
