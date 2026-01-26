@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<a href="{{ route('admin.menus.create') }}" class="btn btn-primary mb-3">
    + Tambah Menu
</a>

<table class="table table-bordered bg-white">
    <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

    @foreach ($menus as $menu)
    <tr>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->category->name }}</td>
        <td>{{ $menu->stock }}</td>
        <td>Rp {{ number_format($menu->price) }}</td>
         <td>{{ $menu->images }}</td>
        <td>
            <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection