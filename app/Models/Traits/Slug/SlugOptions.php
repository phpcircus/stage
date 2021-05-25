<?php

namespace App\Models\Traits\Slug;

class SlugOptions
{
    /** @var array|callable */
    public $generateSlugFrom;

    /** @var string */
    public $slugField;

    /** @var bool */
    public $generateUniqueSlugs = true;

    /** @var int */
    public $maximumLength = 250;

    /** @var bool */
    public $generateSlugsOnCreate = true;

    /** @var bool */
    public $generateSlugsOnUpdate = true;

    /** @var string */
    public $slugSeparator = '-';

    /** @var string */
    public $slugLanguage = 'en';

    /**
     * Construct a new SlugOptions object.
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * The field to generate slugs from.
     *
     * @param string|array|callable $fieldName
     */
    public function generateSlugsFrom($fieldName): self
    {
        if (is_string($fieldName)) {
            $fieldName = [$fieldName];
        }

        $this->generateSlugFrom = $fieldName;

        return $this;
    }

    /**
     * The field to save slugs to.
     *
     * @param  string  $fieldName
     */
    public function saveSlugsTo(string $fieldName): self
    {
        $this->slugField = $fieldName;

        return $this;
    }

    /**
     * Allow duplicate slugs.
     */
    public function allowDuplicateSlugs(): self
    {
        $this->generateUniqueSlugs = false;

        return $this;
    }

    /**
     * Set maximum slug length.
     *
     * @param int $maximumLength
     */
    public function slugsShouldBeNoLongerThan(int $maximumLength): self
    {
        $this->maximumLength = $maximumLength;

        return $this;
    }

    /**
     * Disable generating slugs on create.
     */
    public function doNotGenerateSlugsOnCreate(): self
    {
        $this->generateSlugsOnCreate = false;

        return $this;
    }

    /**
     * Disable generating slugs on update.
     */
    public function doNotGenerateSlugsOnUpdate(): self
    {
        $this->generateSlugsOnUpdate = false;

        return $this;
    }

    /**
     * Set the slug separator.
     *
     * @param  string  $separator
     */
    public function usingSeparator(string $separator): self
    {
        $this->slugSeparator = $separator;

        return $this;
    }

    /**
     * Set the language.
     *
     * @param  string  $language
     */
    public function usingLanguage(string $language): self
    {
        $this->slugLanguage = $language;

        return $this;
    }
}
