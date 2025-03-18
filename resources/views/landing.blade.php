@extends('layouts.app')

@section('title', 'Spotick')

@section('content')
{{-- <style>
    @keyframes float {
        0% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0); }
    }
    .floating {
        animation: float 4s ease-in-out infinite;
    }
    .handwritten {
        font-family: 'Comic Sans MS', cursive, sans-serif;
    }
</style>
<body class="flex items-center justify-center h-screen bg-white relative overflow-hidden">
    <div class="absolute w-36 h-36 bg-blue-400 rounded-full opacity-50 floating" style="top: 20%; left: 30%;"></div>
    <div class="absolute w-48 h-48 bg-blue-300 rounded-full opacity-50 floating" style="top: 50%; left: 60%; animation-delay: 1s;"></div>
    <div class="absolute w-24 h-24 bg-purple-300 rounded-full opacity-50 floating" style="top: 70%; left: 40%; animation-delay: 2s;"></div>
    <div class="absolute w-44 h-44 bg-orange-300 rounded-full opacity-50 floating" style="top: 30%; left: 10%; animation-delay: 3s;"></div>
    <h1 class="text-6xl md:text-8xl handwritten text-black relative z-10">Spotick</h1>
</body> --}}

<div class="container mx-auto my-auto">
    <img src="{{ asset('images/logo.jpg') }}" alt="">
</div>
@endsection

