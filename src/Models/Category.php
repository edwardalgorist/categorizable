<?php

namespace EdwardAlgorist\Categorizable\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    public function categorizables($type = null): Builder
    {

        $query = CategoryModel::query()->where('category_id', $this->id);

        if($type !== null)
            $query = $query->where('type', $type);

        return $query;

    }

}
