<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Landing Page LaundryKu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="bg-gray-900 text-white">

  <!-- Navbar -->
  <header id="header" class="bg-gray-800">
    <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
      <a class="block text-teal-600 dark:text-teal-300" href="#">
        <span class="sr-only">Home</span>
        <svg class="h-8" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z" fill="currentColor" />
        </svg>
      </a>
  
      <!-- Navbar menu -->
      <div class="hidden md:block">
        <nav aria-label="Global">
          <ul class="flex items-center gap-6 text-sm">
            <li><a class="text-gray-400 hover:text-gray-300" href="#home">Home</a></li>
            <li><a class="text-gray-400 hover:text-gray-300" href="#layanan">Layanan</a></li>
            <li><a class="text-gray-400 hover:text-gray-300" href="#proses">Proses</a></li>
            <li><a class="text-gray-400 hover:text-gray-300" href="#testimoni">Testimoni</a></li>
            <li><a class="text-gray-400 hover:text-gray-300" href="#kontak">Kontak</a></li>
          </ul>
        </nav>
      </div>
  
      <!-- Mobile menu button -->
      <div class="md:hidden">
        <button id="navbar-toggle" class="text-gray-400 hover:text-gray-300">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </header>
  

  <!-- Mobile menu -->
  <div id="mobile-menu" class="md:hidden hidden bg-gray-800">
    <nav>
      <ul class="flex flex-col items-center gap-4 py-4">
        <li><a class="text-gray-400 hover:text-gray-300" href="#home">Home</a></li>
        <li><a class="text-gray-400 hover:text-gray-300" href="#layanan">Layanan</a></li>
        <li><a class="text-gray-400 hover:text-gray-300" href="#proses">Proses</a></li>
        <li><a class="text-gray-400 hover:text-gray-300" href="#testimoni">Testimoni</a></li>
        <li><a class="text-gray-400 hover:text-gray-300" href="#kontak">Kontak</a></li>
      </ul>
    </nav>
  </div>
  </header>

  <!-- Hero -->
  <section class="bg-gray-900 lg:grid lg:h-screen lg:place-content-center" id="home">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8 lg:py-32">
      <div class="mx-auto max-w-prose text-center">
        <h1 class="text-4xl font-bold text-white sm:text-5xl">
          Solusi Laundry Cepat & Berkualitas dari
          <strong class="text-indigo-400">LaundryKu</strong>
        </h1>
        <p class="mt-4 text-gray-300 sm:text-lg">
          Kami memberikan layanan laundry terbaik dengan penjemputan dan pengantaran langsung ke rumah Anda.
        </p>
        <div class="mt-6 flex justify-center gap-4">
          <a class="bg-indigo-600 text-white px-5 py-3 rounded font-medium hover:bg-indigo-700" href="#layanan">Lihat Layanan</a>
          <a class="border border-gray-600 text-gray-300 px-5 py-3 rounded font-medium hover:bg-gray-700" href="#kontak">Hubungi Kami</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Layanan -->
  <section id="layanan" class="py-20 bg-gray-800">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12 text-white">Layanan Kami</h2>
      <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">
        @foreach ($service as $item)
        <div class="bg-gray-700 p-6 rounded-lg shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-2">{{ $item->nama_layanan }}</h3>
          <p class="text-teal-400 font-bold">Rp{{ number_format($item->harga_layanan, 0, ',', '.') }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Proses -->
  <section id="proses" class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12 text-white">Cara Kerja Kami</h2>
      <div class="grid md:grid-cols-4 gap-8 text-center">
        <div>
          <div class="text-teal-400 text-4xl mb-2">📦</div>
          <h4 class="font-semibold text-lg text-white">Penjemputan</h4>
          <p class="text-sm text-gray-300">Kami jemput cucian ke lokasi Anda.</p>
        </div>
        <div>
          <div class="text-teal-400 text-4xl mb-2">🧼</div>
          <h4 class="font-semibold text-lg text-white">Pencucian</h4>
          <p class="text-sm text-gray-300">Cucian dicuci sesuai jenis kain.</p>
        </div>
        <div>
          <div class="text-teal-400 text-4xl mb-2">🧺</div>
          <h4 class="font-semibold text-lg text-white">Pengeringan & Setrika</h4>
          <p class="text-sm text-gray-300">Kering & rapi, siap digunakan.</p>
        </div>
        <div>
          <div class="text-teal-400 text-4xl mb-2">🚚</div>
          <h4 class="font-semibold text-lg text-white">Pengantaran</h4>
          <p class="text-sm text-gray-300">Cucian diantar kembali ke Anda.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimoni -->
  <section id="testimoni" class="py-20 bg-gray-800">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12 text-white">Apa Kata Pelanggan?</h2>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-gray-700 p-6 rounded-lg shadow">
          <p class="text-gray-300 italic">"Sangat puas dengan pelayanannya! Cepat dan hasil cucinya bersih banget!"</p>
          <p class="mt-4 font-semibold text-teal-400">– Dinda, Mahasiswa</p>
        </div>
        <div class="bg-gray-700 p-6 rounded-lg shadow">
          <p class="text-gray-300 italic">"Sudah langganan 6 bulan. Kualitas tetap konsisten dan on-time."</p>
          <p class="mt-4 font-semibold text-teal-400">– Budi, Karyawan</p>
        </div>
        <div class="bg-gray-700 p-6 rounded-lg shadow">
          <p class="text-gray-300 italic">"Rekomendasi banget buat ibu rumah tangga yang sibuk kayak saya!"</p>
          <p class="mt-4 font-semibold text-teal-400">– Ibu Rani</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Kontak -->
  <section id="kontak" class="py-20 bg-gray-1000 text-white text-center">
    <div class="max-w-4xl mx-auto px-4">
      <h2 class="text-3xl font-bold mb-6">Hubungi Kami</h2>
      <p class="mb-4">Ada pertanyaan atau ingin pesan layanan? Hubungi kami sekarang!</p>
      <p class="mb-2">📞 0812-3456-7890</p>
      <p class="mb-2">✉️ info@laundryku.id</p>
      <a href="#" class="inline-block mt-4 bg-teal-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-teal-700 transition">Pesan Sekarang</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-center py-6">
    <p>&copy; {{ date('Y') }} LaundryKu. All rights reserved.</p>
  </footer>
<script>
    // Toggle the mobile menu visibility
    const toggleButton = document.getElementById('navbar-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    toggleButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

     // Ambil elemen header
  const header = document.getElementById('header');

// Cek posisi scroll saat halaman digulir
window.onscroll = function() {
  if (window.scrollY > 0) {
    header.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'shadow-lg');
  } else {
    header.classList.remove('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'shadow-lg');
  }
};
  </script>
</body>
</html>
