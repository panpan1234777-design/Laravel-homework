<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->index();
        // $categories = Category::get();
        // dd($categories);
        return view('categories.index',compact('categories'));
    }
    public function edit($id)
    {
        $data = $this->categoryRepository->show($id);

        // $data=Category::find($id);
        return view('categories.edit',compact('data'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string'
        ]);
        $this->categoryRepository->store($data);

        // Category::create($request->all());
        return redirect()->route('categories.index');
    }
    public function update(UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->show($request->id);
        // $category = Category::find($request->id);
        // dd($category);
        $category->update([

            'name' => $request->name
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id)
    {
        $category = $this->categoryRepository->show($id);
            // $category=Category::find($id);

            $category->delete();
            return redirect()->route('categories.index');

    }
}
