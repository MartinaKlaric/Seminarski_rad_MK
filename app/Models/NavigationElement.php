<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NavigationElement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'page_id',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
