<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

trait HasUuid
{
    /**
     * Boot the trait.
     */
    protected static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $model->generateUuid();
        });
    }

    /**
     * There is no Uuid associated with the instance.
     *
     * @return bool
     */
    public function hasUuid(): bool
    {
        return ! is_null($this->uuid);
    }

    /**
     * There is a Uuid associated with the instance.
     *
     * @return bool
     */
    public function needsUuid(): bool
    {
        return ! $this->hasUuid();
    }

    /**
     * Generate a Uuid for a model.
     */
    public function generateUuid()
    {
        if (! $this->needsUuid()) {
            return;
        }

        $this->uuid = Uuid::uuid4();
    }
}
