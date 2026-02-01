@extends('layouts.app')

@section('title', 'Menu')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <form method="GET" class="d-flex">
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               class="form-control"
               placeholder="Cari menu / kategori...">
        <button class="btn btn-outline-secondary ms-2">
            🔍
        </button>
    </form>

    <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">
        + Tambah Menu
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-bordered align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->category->name }}</td>
                        <td>{{ $menu->stock }}</td>
                        <td>Rp {{ number_format($menu->price) }}</td>
                        <td>{{ $menu->images }}</td>
                        <td>
                            <a href="{{ route('admin.menus.edit', $menu) }}"
                               class="btn btn-sm btn-warning">
                               Edit
                            </a>

                            <form action="{{ route('admin.menus.destroy', $menu) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin nih mau hapus menu ini? 🥐')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada menu
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
