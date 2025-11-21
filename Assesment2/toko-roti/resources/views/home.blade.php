@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- HERO SECTION --}}
<div class="p-5 mb-5 text-center rounded-3"
     style="
        background: url('{{ asset('images/Bakery.png') }}') center/cover no-repeat;
        min-height: 280px;
     ">
    <div class="bg-dark bg-opacity-50 p-4 rounded">
        <h1 class="fw-bold text-white">Welcome to Toko Roti Jiya</h1>
        <p class="text-light mb-3">
            Discover our curated collection — crafted with care, delivered with quality.
        </p>

        <a href="#" class="btn btn-primary btn-lg shadow">
            Order Now
        </a>
    </div>
</div>

{{-- KATALOG --}}
<h3 class="fw-bold mb-4">Katalog</h3>

<div class="row">
    @forelse($items as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden item-card"
                 style="transition: 0.3s;">
                 
                <img src="images/Donuts.jpg"
                     class="card-img-top" 
                     alt="{{ $item->name }}">

                <div class="card-body">
                    <h5 class="card-title fw-semibold">{{ $item->name }}</h5>
                    <p class="text-muted" style="min-height: 50px;">
                        {{ $item->description }}
                    </p>

                    <p class="fw-bold mb-2">
                        Rp {{ number_format($item->price, 0, ',', '.') }}
                    </p>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('items.edit', $item->id) }}" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <form action="{{ route('items.destroy', $item->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada item.</p>
    @endforelse
</div>


{{-- CARD HOVER STYLE --}}
<style>
.item-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.25);
}
</style>

@endsection
