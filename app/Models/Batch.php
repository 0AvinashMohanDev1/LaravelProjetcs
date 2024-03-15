<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Batch extends Model
{
    use HasFactory;

    /**
     * Get the quizzes for the batch.
     */
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
}
