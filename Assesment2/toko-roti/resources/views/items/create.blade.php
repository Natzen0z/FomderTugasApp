@extends('layouts.app')

@section('title', 'Tambah Item')

@section('content')

<h1 class="mb-4">Tambah Item</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('items.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama Item</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection
