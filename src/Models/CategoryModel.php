<?php

namespace EdwardAlgorist\Categorizable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CategoryModel extends Model
{

    use HasFactory;

    public function categorizable(): MorphTo
    {
        return $this->morphTo();
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id');
    }

}
