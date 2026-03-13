<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $table = "tickets";
    protected $fillable = [
        "user_id",
        "title",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
