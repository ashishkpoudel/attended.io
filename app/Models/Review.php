<?php

namespace App\Models;

use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends BaseModel
{
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
