<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SecondaryCategory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrimaryCategory extends Model
{
    use HasFactory;

    public function secondary(): HasMany
    {
        return $this->hasMany(SecondaryCategory::class);
    }
}
