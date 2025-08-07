<?php

namespace App\Models;

use App\Enums\RegisterEmotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Register extends Model
{

    protected $casts = [
        'emotion' => RegisterEmotion::class,
    ];

    public function results(): BelongsTo
    {
        return $this->belongsTo(Results::class);
    }
}
