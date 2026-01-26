@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold">Edit Kategori</h2>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $category->name) }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control"
                        value="{{ old('slug', $category->slug) }}">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button class="btn btn-warning">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
