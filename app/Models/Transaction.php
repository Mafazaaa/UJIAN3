<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'amount',
        'status'
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
} 