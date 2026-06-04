<?php
namespace App\Services;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function categoryTotal()
    {
        $categorys = $this->categoryRepository->index();
        return $categorys->count();
    }
}
