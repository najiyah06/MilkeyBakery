<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function search(Request $request)
    {
        $query = trim($request->q);

        $menus = Menu::where('is_available', 1)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->get();

        return view('menu.category', [
            'menus' => $menus,
            'category' => (object) ['name' => 'Search Results'],
            'query' => $query
        ]);
    }
}