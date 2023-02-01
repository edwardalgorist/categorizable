<?php


namespace EdwardAlgorist\Categorizable\Traits;

use EdwardAlgorist\Categorizable\Models\Category;
use EdwardAlgorist\Categorizable\Models\CategoryModel;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Collection;

trait HasCategory
{

    public function categories(): MorphMany
    {
        return $this->morphMany(CategoryModel::class, 'categorizable');
    }

    public function categorize(int|string|Category $category): static
    {

        $category = $this->findCategory($category);

        if($category !== null)
            $this->categories()->updateOrCreate(
                ['category_id' => $category->id],
                [
                    'category_id' => $category->id,
                    'type' => method_exists($this, 'type') ? $this->type() : null
                ]
            );

        return $this;

    }

    public function decategorize(int|string|Category $category = null): static
    {

        $categories = $this->categories();

        if ($category === null)
        {
            $categories->delete();
        }
        else
        {
            $category = $this->findCategory($category);
            $categories->firstWhere('category_id', $category->id)?->delete();
        }

        return $this;

    }

    private function findCategory($category)
    {

        if(is_int($category))
        {
            $category = Category::query()->find($category);
        }
        else if(is_string($category))
        {
            $category = Category::query()->firstWhere('name', $category);
        }

        return $category;

    }

}
