<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title","description","like_count","is_published","category_id"];

    public function category(): BelongsTo
    {
        return $this -> belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this-> hasMany(Comment::class);
    }
}
