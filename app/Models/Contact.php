<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // use HasFactory;

    protected $table = "contacts";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id", "users");
    }
}
