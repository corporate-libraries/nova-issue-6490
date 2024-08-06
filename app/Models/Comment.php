<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphToMany(User::class, 'likeable', 'user_likes')
            ->withPivot('like')
            ->withTimestamps();
    }

    public function emojis()
    {
        return $this->morphToMany(User::class, 'emojiable', 'user_emojis')
            ->withPivot('emoji')
            ->withTimestamps();
    }
}
