<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('admin.dashboard', [
    //         'menuCount' => Menu::count(),
    //         'categoryCount' => Category::count(),
    //         'userCount' => User::count(),
    //     ]);
    // }
    public function index()
        {
            $menuCount = Menu::count();
            $categoryCount = Category::count();
            $userCount = User::where('role', 'user')->count();

            return view('admin.dashboard', compact(
                'menuCount',
                'categoryCount',
                'userCount'
            ));
        }
}