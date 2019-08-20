<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{

    /**
     * @var Category
     */
    protected $categories;

    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    public function compose(View $view)
    {
        $categories = Category::inRandomOrder()->get();
        $view->with('categories', $categories);
    }
}
