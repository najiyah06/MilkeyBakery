<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    public function category($slug)
    {
        // ambil kategori dari slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // ambil menu berdasarkan category_id
        $menus = Menu::where('category_id', $category->id)
            ->where('is_available', 1)
            ->get();

        return view("menu.$slug", compact('menus'));
    }
}
