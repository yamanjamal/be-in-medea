<?php

namespace App\Http\Controllers;

use App\Http\QueryPipelines\CategoryPipeline\CategoryPipeline;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menu = auth()->user()->menu()->first();
        $categories = CategoryPipeline::make(
        builder: $menu->Categories()->getQuery(),
        request: $request,
        )->paginate();

        return Inertia::render('Categories/Categories', [
            'menu' => new MenuResource($menu->load('Categories')),
            'categories' => CategoryResource::collection($categories),
            'filters' => $request->only('sort_by', 'sort_order'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Menus/AddMenu');
    }

    public function store(StoreMenuRequest $request)
    {
        $menu = Menu::create($request->validated());
        session()->flash('success', 'New menu got added successfully!');
        return redirect()->route('menu.index');
    }

    public function show(Menu $menu)
    {
        return Inertia::render('Menus/ShowMenu', [
            'menu' => new MenuResource($menu),
        ]);
    }

    public function edit(Menu $menu)
    {
        return Inertia::render('Menus/EditMenu', [
            'menu' => new MenuResource($menu),
        ]);
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->validated());
        session()->flash('success', 'The menu was updated successfully!');
        return redirect()->route('menu.index');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        session()->flash('success', 'The menu deleted successfully!');
        return redirect()->route('menu.index');
    }
}