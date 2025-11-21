@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')

<h1 class="mb-4">Edit Item</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('items.update', $item->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Item</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description', $item->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $item->price) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $item->stock) }}">
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>