@extends('layouts.app')

@section('title', 'Order Now')

@section('content')

<h1 class="fw-bold mb-4">Order Now</h1>

<p class="mb-4">
    Silakan hubungi kami melalui WhatsApp untuk melakukan pemesanan roti.
    Kami akan memproses pesananmu secepat mungkin! 🍞✨
</p>

<div class="card shadow-sm p-4">
    <h5 class="fw-semibold mb-3">Hubungi Kami</h5>

    <a href="https://wa.me/6285210567503?text=Halo%20Toko%20Roti%20Jiya,%20saya%20ingin%20memesan%20roti."
       class="btn btn-success btn-lg">
       Chat WhatsApp
    </a>
</div>

@endsection
