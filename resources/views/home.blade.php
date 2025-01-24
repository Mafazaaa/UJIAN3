@extends('layouts.app')

@section('content')
    @auth
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-2xl font-bold mb-4">Selamat Datang, {{ auth()->user()->name }}!</h2>
                        @if(auth()->user()->role === 'customer')
                            <div class="space-y-6">
                                <p class="text-gray-600">
                                    Anda dapat mulai menggunakan layanan penitipan kami dengan mengklik menu "Penitipan Saya".
                                </p>
                                <div class="flex">
                                    <a href="{{ route('customer.page.create') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        Titip Sekarang
                                    </a>
                                </div>
                            </div>
                        @elseif(auth()->user()->role === 'employee')
                            <p class="text-gray-600">
                                Anda dapat mengelola daftar penitipan dan membuat laporan harian.
                            </p>
                        @else
                            <p class="text-gray-600">
                                Selamat datang di dashboard admin.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Hero Section -->
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                        Solusi Penitipan Terpercaya
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Kami menyediakan layanan penitipan yang aman dan terpercaya untuk hewan peliharaan dan bangunan Anda.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                            Mulai Sekarang
                        </a>
                        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">
                            Masuk <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div id="services" class="py-24 bg-white sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Layanan Kami</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Semua yang Anda Butuhkan
                    </p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                        <!-- Penitipan Hewan -->
                        <div class="flex flex-col items-start">
                            <div class="rounded-md bg-indigo-500/10 p-2 ring-1 ring-indigo-500/20">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                                </svg>
                            </div>
                            <dt class="mt-4 font-semibold text-gray-900">Penitipan Hewan</dt>
                            <dd class="mt-2 leading-7 text-gray-600">
                                Layanan penitipan hewan peliharaan dengan fasilitas lengkap, perawatan profesional, dan pemantauan 24 jam.
                            </dd>
                        </div>

                        <!-- Penitipan Bangunan -->
                        <div class="flex flex-col items-start">
                            <div class="rounded-md bg-indigo-500/10 p-2 ring-1 ring-indigo-500/20">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                            </div>
                            <dt class="mt-4 font-semibold text-gray-900">Penitipan Bangunan</dt>
                            <dd class="mt-2 leading-7 text-gray-600">
                                Jasa penitipan dan pengawasan bangunan dengan sistem keamanan 24 jam, maintenance berkala, dan laporan rutin.
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div id="about" class="py-24 bg-gray-50 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Tentang Kami</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Siapa Kami
                    </p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Kami adalah penyedia layanan penitipan terpercaya dengan pengalaman bertahun-tahun dalam industri ini.
                    </p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div id="contact" class="py-24 bg-white sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Kontak</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Hubungi Kami
                    </p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Email: info@penitipan.com<br>
                        Telepon: (021) 1234-5678<br>
                        Alamat: Jl. Contoh No. 123, Jakarta
                    </p>
                </div>
            </div>
        </div>
    @endauth
@endsection 