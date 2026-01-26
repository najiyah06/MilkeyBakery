<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $menus = Menu::where('category_id', $category->id)
            ->where('is_available', 1)
            ->get();

        return view('menu.category', compact('category', 'menus'));
    }
}