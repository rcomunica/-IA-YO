<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use function Pest\Laravel\get;

class Results extends Model
{
    use HasFactory;

    protected $appends = ['average_score'];

    public function register(): BelongsTo
    {
        return $this->belongsTo(Register::class);
    }

    public function getAverageScoreAttribute(): int
    {
        return round(($this->ia_score + $this->music_score + $this->profesional_score) / 3, 0);
    }
}
