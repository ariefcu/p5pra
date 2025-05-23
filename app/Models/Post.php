<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


Class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['cari'] ?? false,
            fn ($query, $cari) =>
            $query->where('title', 'like', '%' . $cari . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->wherehas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->wherehas('author', fn($query) => $query->where('username', $author))
        );
    }
}
