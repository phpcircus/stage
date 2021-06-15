<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use App\Models\Traits\HasUuid;
use App\Models\Traits\Slug\SlugOptions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use HasSlug;
    use HasUuid;
    use Searchable;

    /** @var array */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
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
     * Determine if the model should be searchable.
     *
     * @return bool
     */
    public function shouldBeSearchable()
    {
        return null !== $this->published_at && $this->published_at <= now();
    }

    /**
     * Modify the query used to retrieve models when making all of the models searchable.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function makeAllSearchableUsing($query)
    {
        return $query->with('categories');
    }

    /**
     * A Post belongs to a User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A Post belongs to many Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }

    /**
     * Scope the current query to the Posts that are
     * published on or before the current date.
     */
    public function scopePublished(Builder $builder): Builder
    {
        return $builder->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    /**
     * Are there new posts from the last week?
     */
    public function hasNewPosts(): bool
    {
        return $this->where('published_at', '>=', now()->subDays(7)->startOfDay())->count() > 0;
    }
}
