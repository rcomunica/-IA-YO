<?php

namespace App\Models;

use App\Enums\RegisterEmotion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Register extends Model
{
    use HasFactory;

    protected $casts = [
        'emotion' => RegisterEmotion::class,
    ];

    public function results(): HasOne
    {
        return $this->hasOne(Results::class);
    }

    public function profesional(): BelongsTo
    {
        return $this->belongsTo(Profesional::class);
    }

    public static function mostCommonValue()
    {
        return Register::select('emotion', DB::raw('COUNT(*) as total'))
            ->groupBy('emotion')
            ->orderByDesc('total')
            ->first();
    }
}
