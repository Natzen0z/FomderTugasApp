@extends('layouts.app')

@section('title', 'Partnership')

@section('content')

<h1 class="fw-bold mb-4">Partnership</h1>

<p class="mb-4">
    Toko Roti Jiya membuka kesempatan kerjasama untuk usaha, event, café,
    maupun reseller. Kami menyediakan roti berkualitas tinggi dengan harga bersahabat.
</p>

<div class="row">

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm p-4 h-100">
            <h5 class="fw-semibold">Café & Coffee Shop</h5>
            <p class="text-muted">Suplai roti harian untuk menu café.</p>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm p-4 h-100">
            <h5 class="fw-semibold">Event & Catering</h5>
            <p class="text-muted">Pesanan besar untuk acara spesial.</p>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm p-4 h-100">
            <h5 class="fw-semibold">Reseller</h5>
            <p class="text-muted">Jadi mitra penjualan Toko Roti Jiya.</p>
        </div>
    </div>

</div>

<div class="mt-4">
    <a href="https://wa.me/6281234567890"
       class="btn btn-primary btn-lg">
       Hubungi Kami
    </a>
</div>

@endsection
