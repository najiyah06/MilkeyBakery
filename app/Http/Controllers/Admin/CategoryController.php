<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // =======================
    // TAMPILKAN LIST KATEGORI
    // =======================
public function index()
{
    $categories = Category::orderBy('created_at', 'desc')
        ->paginate(10);

    return view('admin.categories.index', compact('categories'));
}



    // =======================
    // FORM TAMBAH KATEGORI
    // =======================
    public function create()
    {
        return view('admin.categories.create');
    }

    // =======================
    // SIMPAN KATEGORI BARU
    // =======================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // =======================
    // FORM EDIT KATEGORI
    // =======================
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // =======================
    // UPDATE KATEGORI
    // =======================
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    // =======================
    // HAPUS KATEGORI
    // =======================
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}