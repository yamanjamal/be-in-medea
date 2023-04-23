<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MenuResource;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Menu $menu)
    {
        //
    }

    public function create(Menu $menu)
    {
        return Inertia::render('Categories/AddCategory', [
            'menu' => new MenuResource($menu),
        ]);
    }

    public function store(StorecategoryRequest $request, Menu $menu)
    {
        $menu->Categories()->create($request->validated());
        session()->flash('success', 'New category added successfully!');
        return redirect()->route('menu.index');
    }

    public function show(Menu $menu, Category $category)
    {
        return Inertia::render('Categories/ShowCategory', [
            'menu' => new MenuResource($menu),
            'category' => new CategoryResource($category),
        ]);
    }

    public function edit(Menu $menu, Category $category)
    {
        return Inertia::render('Categories/EditCategory', [
            'menu' => new MenuResource($menu),
            'category' => new CategoryResource($category),
        ]);
    }

    public function update(UpdatecategoryRequest $request, Menu $menu, Category $category)
    {
        $category->update($request->validated());
        session()->flash('success', 'The category was updated successfully!');
        return redirect()->route('menu.index');
    }

    public function destroy(Menu $menu, Category $category)
    {
        $category->delete();
        session()->flash('success', 'The category deleted successfully!');
        return redirect()->route('menu.index');
    }
}