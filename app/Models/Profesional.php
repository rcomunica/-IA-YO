<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesional extends Model
{
    public function registers(): HasMany
    {
        return $this->hasyMany(Register::class);
    }
}
