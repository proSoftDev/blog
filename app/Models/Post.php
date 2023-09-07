<?php

namespace App\Models;

use App\Services\Interaction\Traits\InteractsWithExternalData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    use SoftDeletes,
        InteractsWithExternalData;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected array $external = [
        'title',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getShortBodyAttribute(): string
    {
        return Str::limit($this->body, 128);
    }
}
