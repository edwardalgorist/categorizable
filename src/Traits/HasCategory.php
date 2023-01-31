<?php


namespace EdwardAlgorist\Categorizable\Traits;

use EdwardAlgorist\Categorizable\Models\CategoryModel;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasCategory
{

    public function category(): MorphOne
    {
        return $this->morphOne(CategoryModel::class, 'categorizable');
    }

    public function categories(): MorphMany
    {
        return $this->morphMany(CategoryModel::class, 'categorizable');
    }

}
