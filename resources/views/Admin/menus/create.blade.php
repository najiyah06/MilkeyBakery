@extends('layouts.app')

@section('title', 'Tambah Menu')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tambah Menu</h2>
        <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.menus.store') }}" method="POST">
                @csrf

                {{-- NAMA --}}
                <div class="mb-3">
                    <label class="form-label">Nama Menu</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name') }}" required>
                </div>

                {{-- KATEGORI --}}
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- STOK --}}
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stock" class="form-control"
                        value="{{ old('stock', 0) }}" min="0" required>
                </div>

                {{-- HARGA --}}
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control"
                        value="{{ old('price') }}" min="0" required>
                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

                {{-- GAMBAR --}}
                <div class="mb-3">
                    <label class="form-label">Image URL</label>
                    <input type="text" name="image" class="form-control"
                        value="{{ old('image') }}" required>
                </div>

                {{-- STATUS --}}
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="is_available" value="1" checked>
                    <label class="form-check-label">
                        Menu tersedia
                    </label>
                </div>

                {{-- BUTTON --}}
                <div class="text-end">
                    <button class="btn btn-primary px-4">
                        ➕ Simpan Menu
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
