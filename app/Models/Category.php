<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use App\Models\Traits\HasUuid;
use App\Models\Traits\Slug\SlugOptions;

class Category extends Model
{
    use HasSlug;
    use HasUuid;

    /** @var array */
    protected $attributes = [
        'color' => 'blue-400',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * A Category belongs to many Posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post', 'category_id', 'post_id');
    }

    /**
     * Get the color of the category.
     */
    public function getColorAttribute(): string
    {
        return $this->attributes['color'] ?? 'blue-400';
    }
}
