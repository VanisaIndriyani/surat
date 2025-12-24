@extends('layouts.app')

@section('title', 'Dashboard - Arsip Surat Ngodingyuk')

@section('header', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden card-hover">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>
        <div class="relative z-10 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-user text-3xl bg-gradient-to-r from-indigo-600 to-pink-500 bg-clip-text text-transparent"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}! 👋</h2>
                    <p class="text-white/90 mt-1">Kelola arsip surat masuk dan keluar dengan mudah</p>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="w-24 h-24 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                    <i class="fas fa-archive text-4xl text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Surat Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 card-hover relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-100 to-blue-50 rounded-full -mr-16 -mt-16"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-archive text-white text-xl"></i>
                    </div>
                    <i class="fas fa-chart-line text-blue-200 text-2xl"></i>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Total Surat</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalSurat }}</p>
                <p class="text-xs text-gray-500 mt-2">Semua surat</p>
            </div>
        </div>

        <!-- Surat Masuk Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 card-hover relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-100 to-green-50 rounded-full -mr-16 -mt-16"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-inbox text-white text-xl"></i>
                    </div>
                    <i class="fas fa-arrow-down text-green-200 text-2xl"></i>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Surat Masuk</p>
                <p class="text-3xl font-bold text-gray-900">{{ $suratMasuk }}</p>
                <p class="text-xs text-gray-500 mt-2">Surat yang masuk</p>
            </div>
        </div>

        <!-- Surat Keluar Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 card-hover relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-orange-100 to-orange-50 rounded-full -mr-16 -mt-16"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-paper-plane text-white text-xl"></i>
                    </div>
                    <i class="fas fa-arrow-up text-orange-200 text-2xl"></i>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Surat Keluar</p>
                <p class="text-3xl font-bold text-gray-900">{{ $suratKeluar }}</p>
                <p class="text-xs text-gray-500 mt-2">Surat yang keluar</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Aksi Cepat</h3>
                <p class="text-sm text-gray-500 mt-1">Akses cepat ke fitur utama</p>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-bolt text-indigo-600"></i>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('surat.create') }}" class="group flex flex-col items-center p-6 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl hover:from-indigo-100 hover:to-purple-100 transition-all duration-200 border border-indigo-100 card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-plus text-white text-lg"></i>
                </div>
                <p class="font-semibold text-gray-900 mb-1">Tambah Surat</p>
                <p class="text-xs text-gray-600 text-center">Tambah surat baru</p>
            </a>

            <a href="{{ route('surat.index', ['jenis' => 'masuk']) }}" class="group flex flex-col items-center p-6 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl hover:from-green-100 hover:to-emerald-100 transition-all duration-200 border border-green-100 card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-green-600 to-emerald-600 rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-inbox text-white text-lg"></i>
                </div>
                <p class="font-semibold text-gray-900 mb-1">Surat Masuk</p>
                <p class="text-xs text-gray-600 text-center">Lihat surat masuk</p>
            </a>

            <a href="{{ route('surat.index', ['jenis' => 'keluar']) }}" class="group flex flex-col items-center p-6 bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl hover:from-orange-100 hover:to-amber-100 transition-all duration-200 border border-orange-100 card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-600 to-amber-600 rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-paper-plane text-white text-lg"></i>
                </div>
                <p class="font-semibold text-gray-900 mb-1">Surat Keluar</p>
                <p class="text-xs text-gray-600 text-center">Lihat surat keluar</p>
            </a>

            <a href="{{ route('dashboard') }}" class="group flex flex-col items-center p-6 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl hover:from-blue-100 hover:to-cyan-100 transition-all duration-200 border border-blue-100 card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-chart-bar text-white text-lg"></i>
                </div>
                <p class="font-semibold text-gray-900 mb-1">Statistik</p>
                <p class="text-xs text-gray-600 text-center">Lihat statistik</p>
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Aktivitas Terbaru</h3>
                <p class="text-sm text-gray-500 mt-1">Surat yang baru ditambahkan</p>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-pink-100 to-rose-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-clock text-pink-600"></i>
            </div>
        </div>
        <div class="space-y-3">
            @php
                $recentSurats = \App\Models\Surat::orderBy('created_at', 'desc')->limit(5)->get();
            @endphp
            
            @if($recentSurats->count() > 0)
                @foreach($recentSurats as $surat)
                <div class="flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-50 rounded-xl hover:from-indigo-50 hover:to-purple-50 transition-all duration-200 border border-gray-100 hover:border-indigo-200 card-hover">
                    @if($surat->jenis == 'masuk')
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mr-4 shadow-md">
                            <i class="fas fa-inbox text-white"></i>
                        </div>
                    @else
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-amber-500 rounded-xl flex items-center justify-center mr-4 shadow-md">
                            <i class="fas fa-paper-plane text-white"></i>
                        </div>
                    @endif
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 mb-1">{{ $surat->perihal }}</p>
                        <div class="flex items-center space-x-2 text-xs text-gray-600">
                            @if($surat->jenis == 'masuk')
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-lg font-medium">
                                    Masuk
                                </span>
                            @else
                                <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-lg font-medium">
                                    Keluar
                                </span>
                            @endif
                            <span class="text-gray-400">•</span>
                            <span class="text-gray-500">{{ $surat->nomor_surat }}</span>
                            <span class="text-gray-400">•</span>
                            <span class="text-gray-500">{{ $surat->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <a href="{{ route('surat.show', $surat) }}" class="w-10 h-10 bg-indigo-100 hover:bg-indigo-600 rounded-lg flex items-center justify-center text-indigo-600 hover:text-white transition-all duration-200 ml-4">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
                @endforeach
            @else
                <div class="text-center py-12 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border-2 border-dashed border-gray-300">
                    <div class="w-20 h-20 bg-gray-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-inbox text-4xl text-gray-400"></i>
                    </div>
                    <p class="text-gray-600 font-medium mb-2">Belum ada surat yang ditambahkan</p>
                    <p class="text-sm text-gray-500 mb-4">Mulai dengan menambahkan surat pertama Anda</p>
                    <a href="{{ route('surat.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Surat Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
