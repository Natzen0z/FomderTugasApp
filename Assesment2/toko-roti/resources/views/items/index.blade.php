@extends('layouts.app')

@section('title', 'Items')

@section('content')

<h1 class="mb-4">Items</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('items.create') }}" class="btn btn-primary mb-3">
    Tambah Item
</a>

<table class="table table-bordered table-striped shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th style="width: 180px;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->formatted_price }}</td>
            <td>{{ $item->stock }}</td>
            <td>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('items.destroy', $item->id) }}" 
                      method="POST" 
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
