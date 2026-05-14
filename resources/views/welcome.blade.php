@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-slate-900 text-white flex items-center justify-center min-h-[80vh]">
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://image-cdn.leakedzone.com/storage/images/427/22499172/22499172.webp" alt="Perkebunan Tembakau" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-slate-900/50"></div>
        </div>
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6">Warisan Tembakau <span class="text-amber-500">Indonesia</span></h1>
            <p class="text-lg md:text-2xl font-light text-gray-300 mb-10 max-w-3xl mx-auto">Menghadirkan kualitas daun tembakau terbaik dari tanah nusantara ke kancah dunia. Tradisi yang dijaga sejak ratusan tahun lalu.</p>
            <a href="#katalog" class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-4 rounded-full font-semibold transition duration-300 shadow-lg hover:shadow-amber-600/50">Lihat Koleksi Premium</a>
        </div>
    </section>

    <!-- Katalog Tembakau -->
    <section id="katalog" class="py-24 px-4 max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-4">Katalog Kami</h2>
            <div class="w-24 h-1.5 bg-amber-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Card 1: Srintil -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <div class="h-64 bg-gray-200 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1533560904424-a0c61dc306fc?q=80&w=800&auto=format&fit=crop" alt="Tembakau Srintil" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-2xl font-bold text-slate-800">Srintil Temanggung</h3>
                        <span class="bg-amber-100 text-amber-800 text-xs px-3 py-1 rounded-full font-bold">Grade A+</span>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">Tembakau sultan dengan aroma magis yang pekat. Hanya tumbuh di kondisi iklim mikro tertentu di lereng Sindoro-Sumbing.</p>
                </div>
            </div>

            <!-- Card 2: Besuki -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <div class="h-64 bg-gray-200 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1628155930542-3c7a64e2c833?q=80&w=800&auto=format&fit=crop" alt="Tembakau Besuki" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-2xl font-bold text-slate-800">Besuki Na Oogst</h3>
                        <span class="bg-amber-100 text-amber-800 text-xs px-3 py-1 rounded-full font-bold">Ekspor</span>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">Primadona dari Jawa Timur. Daun yang lebar dan elastis menjadikannya pilihan utama sebagai pembungkus cerutu premium dunia.</p>
                </div>
            </div>

            <!-- Card 3: Deli -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <div class="h-64 bg-gray-200 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1622320478099-31765c71d374?q=80&w=800&auto=format&fit=crop" alt="Tembakau Deli" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-2xl font-bold text-slate-800">Deli Wrapper</h3>
                        <span class="bg-amber-100 text-amber-800 text-xs px-3 py-1 rounded-full font-bold">Legenda</span>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">Tembakau legendaris dari Sumatera Utara. Dikenal di pelelangan Bremen karena daunnya yang sangat tipis bagai sutra.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulir Kontak -->
    <section class="bg-slate-100 py-24 px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Tertarik dengan Produk Kami?</h2>
                <p class="text-gray-600">Silakan hubungi kami untuk informasi harga grosir atau kebutuhan ekspor.</p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded shadow-sm" role="alert">
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6 bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-100">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition duration-200" placeholder="Masukkan nama Anda">
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition duration-200" placeholder="email@contoh.com">
                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Pesan Anda</label>
                    <textarea name="message" id="message" rows="5" required class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition duration-200" placeholder="Tuliskan kebutuhan Anda di sini..."></textarea>
                    @error('message') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-full bg-slate-900 hover:bg-amber-600 text-white font-bold py-4 rounded-lg transition-colors duration-300 shadow-md">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </section>
@endsection
