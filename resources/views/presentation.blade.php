<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentasi Interaktif EVAKIN — Sistem Kinerja Daerah Modern</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f3ff',
                            100: '#e1e7ff',
                            200: '#c5d0ff',
                            300: '#9aa9ff',
                            400: '#6875ff',
                            500: '#4f46e5', // Royal Indigo
                            600: '#3b2cd9',
                            700: '#3120be',
                            800: '#291b9c',
                            900: '#251a7e',
                        },
                    }
                }
            }
        }
    </script>
    
    <!-- FontAwesome for Premium Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Modern Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #090d16;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }

        body {
            background: #060913;
            color: #f1f5f9;
            overflow-x: hidden;
        }

        /* Ambient Glow Backdrop */
        .ambient-glow-1 {
            background: radial-gradient(circle, rgba(79, 70, 229, 0.15) 0%, transparent 65%);
        }
        .ambient-glow-2 {
            background: radial-gradient(circle, rgba(6, 182, 212, 0.12) 0%, transparent 65%);
        }
        .ambient-glow-3 {
            background: radial-gradient(circle, rgba(236, 72, 153, 0.08) 0%, transparent 65%);
        }

        /* SVG Grid Background Overlay */
        .grid-overlay {
            background-image: radial-gradient(rgba(99, 102, 241, 0.07) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Glassmorphism Styles */
        .glass-panel {
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }

        /* Slide Transition Animations */
        .slide-container {
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.6s ease;
        }

        /* Custom Keyboard Keys Styling */
        .key-badge {
            background: linear-gradient(180deg, #334155 0%, #1e293b 100%);
            border: 1px solid #475569;
            box-shadow: 0 2px 4px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.1);
        }

        /* Typing cursor animation */
        @keyframes blink {
            50% { opacity: 0; }
        }
        .cursor-blink {
            animation: blink 0.9s infinite;
        }
    </style>
</head>
<body class="font-sans antialiased min-h-screen relative flex flex-col justify-between overflow-hidden select-none">

    <!-- Backdrops -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] right-[-10%] w-[600px] h-[600px] ambient-glow-1 rounded-full z-0"></div>
        <div class="absolute bottom-[-15%] left-[-10%] w-[700px] h-[700px] ambient-glow-2 rounded-full z-0"></div>
        <div class="absolute top-[30%] left-[20%] w-[500px] h-[500px] ambient-glow-3 rounded-full z-0"></div>
        <div class="absolute inset-0 grid-overlay z-0 opacity-80"></div>
    </div>

    <!-- HEADER / NAVIGATION TOP BAR -->
    <header class="relative z-50 px-6 py-4 flex justify-between items-center glass-panel border-b border-white/5 mx-4 mt-4 rounded-2xl">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-500 to-cyan-400 flex items-center justify-center shadow-lg shadow-brand-500/20 overflow-hidden">
                @if(get_setting('app_logo'))
                    <img id="presentation-header-logo" src="{{ asset(get_setting('app_logo')) }}" alt="Logo" class="w-full h-full object-cover">
                @else
                    <i class="fa-solid fa-chart-line text-white text-lg"></i>
                @endif
            </div>
            <div>
                <h1 class="font-extrabold text-lg tracking-tight bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent" id="app-name-preview">
                    {{ get_setting('app_name', 'EVAKIN') }}
                </h1>
                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-semibold" id="org-name-preview">
                    {{ get_setting('organization_name', 'Pemerintah Daerah') }}
                </p>
            </div>
        </div>

        <!-- Slide Title Indicator -->
        <div class="hidden md:flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-900/60 border border-white/5">
            <span class="text-xs text-brand-400 font-bold uppercase tracking-wider">Slide <span id="current-slide-num">1</span> dari 9:</span>
            <span class="text-xs text-slate-300 font-medium" id="current-slide-title">Cover</span>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl bg-slate-900 border border-white/10 hover:border-brand-500/30 text-xs font-semibold text-slate-200 transition-all flex items-center gap-2 hover:scale-[1.02]">
                <i class="fa-solid fa-sign-in-alt text-brand-400"></i> Masuk Aplikasi
            </a>
        </div>
    </header>

    <!-- MAIN SLIDESHOW WORKSPACE -->
    <main class="relative z-40 flex-grow w-full max-w-7xl mx-auto px-4 md:px-6 py-6 flex items-center justify-center">
        
        <!-- SIDEBAR NAVIGATION MENU (FLOATING) -->
        <aside class="hidden lg:flex flex-col gap-2 glass-panel p-3 rounded-2xl border border-white/5 mr-6 shrink-0 z-50">
            <p class="text-[9px] font-bold text-slate-500 uppercase tracking-wider mb-2 text-center">Navigasi</p>
            <button onclick="goToSlide(0)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="0">
                <i class="fa-solid fa-play w-4 text-center"></i> Cover
            </button>
            <button onclick="goToSlide(1)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="1">
                <i class="fa-solid fa-question-circle w-4 text-center"></i> Masalah & Solusi
            </button>
            <button onclick="goToSlide(2)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="2">
                <i class="fa-solid fa-desktop w-4 text-center"></i> Demo Dashboard
            </button>
            <button onclick="goToSlide(3)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="3">
                <i class="fa-brands fa-whatsapp w-4 text-center"></i> WA Gateway
            </button>
            <button onclick="goToSlide(4)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="4">
                <i class="fa-solid fa-palette w-4 text-center"></i> White-Label
            </button>
            <button onclick="goToSlide(5)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="5">
                <i class="fa-solid fa-users w-4 text-center"></i> Penilaian PPPK
            </button>
            <button onclick="goToSlide(6)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="6">
                <i class="fa-solid fa-file-export w-4 text-center"></i> Ekspor PDF/Excel
            </button>
            <button onclick="goToSlide(7)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="7">
                <i class="fa-solid fa-server w-4 text-center"></i> Arsitektur & Instalan
            </button>
            <button onclick="goToSlide(8)" class="slide-menu-btn text-left px-3 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-2 text-slate-400 hover:bg-white/5" data-slide="8">
                <i class="fa-solid fa-handshake w-4 text-center"></i> Hubungi Developer
            </button>
        </aside>

        <!-- SLIDES WRAPPER FRAME -->
        <div class="flex-grow relative h-[560px] md:h-[600px] overflow-hidden rounded-3xl glass-panel shadow-2xl border border-white/10">

            <!-- ================= SLIDE 0: COVER ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="0" data-slide-title="Cover">
                <div class="flex-grow flex flex-col justify-center items-center text-center mt-4">
                    <!-- Glowing Badge -->
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-500/10 border border-brand-500/30 text-xs font-bold text-brand-300 uppercase tracking-widest mb-6 animate-pulse">
                        <i class="fa-solid fa-sparkles"></i> Aplikasi Kinerja Premium
                    </span>
                    
                    <h2 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-4">
                        <span class="bg-gradient-to-r from-white via-slate-100 to-slate-400 bg-clip-text text-transparent">EVAKIN</span>
                    </h2>
                    
                    <p class="text-lg md:text-xl text-slate-300 max-w-2xl font-light mb-8 leading-relaxed">
                        Sistem manajemen evaluasi kinerja bulanan untuk pegawai PPPK Paruh Waktu yang <span class="text-brand-300 font-semibold">modern, cepat, dan efisien</span>, dilengkapi WhatsApp Gateway mandiri.
                    </p>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl w-full mb-8">
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/5 flex flex-col items-center">
                            <i class="fa-brands fa-whatsapp text-2xl text-emerald-400 mb-2"></i>
                            <span class="text-lg font-bold text-white">Self-Hosted</span>
                            <span class="text-[10px] text-slate-400">WhatsApp Gateway</span>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/5 flex flex-col items-center">
                            <i class="fa-solid fa-palette text-2xl text-pink-400 mb-2"></i>
                            <span class="text-lg font-bold text-white">White-Label</span>
                            <span class="text-[10px] text-slate-400">Branding Instan</span>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/5 flex flex-col items-center">
                            <i class="fa-solid fa-bolt text-2xl text-amber-400 mb-2"></i>
                            <span class="text-lg font-bold text-white">Vite & Tailwind</span>
                            <span class="text-[10px] text-slate-400">Performa Super Cepat</span>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/5 flex flex-col items-center">
                            <i class="fa-solid fa-file-excel text-2xl text-blue-400 mb-2"></i>
                            <span class="text-lg font-bold text-white">Pdf & Excel</span>
                            <span class="text-[10px] text-slate-400">Export Laporan</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center border-t border-white/5 pt-6 gap-4">
                    <div class="flex items-center gap-4 text-xs text-slate-400">
                        <span><i class="fa-solid fa-user-tie text-brand-400 mr-1"></i> Developer Ready</span>
                        <span><i class="fa-solid fa-shield-halved text-cyan-400 mr-1"></i> Aman & Ringan</span>
                    </div>
                    <button onclick="nextSlide()" class="px-8 py-3 rounded-xl bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-600 text-sm font-bold text-white shadow-lg shadow-brand-500/20 flex items-center gap-2 hover:scale-[1.03] transition-all cursor-pointer">
                        Mulai Presentasi <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </section>

            <!-- ================= SLIDE 1: MASALAH & SOLUSI ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="1" data-slide-title="Masalah & Solusi">
                <div>
                    <h3 class="text-xs font-bold text-brand-400 uppercase tracking-widest mb-2"><i class="fa-solid fa-lightbulb mr-1"></i> Mengapa EVAKIN Dibutuhkan?</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white">Penyederhanaan Birokrasi Kinerja</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-auto">
                    <!-- MASALAH (CARD MERAH) -->
                    <div class="p-6 rounded-2xl bg-red-950/20 border border-red-500/20 relative overflow-hidden group">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-red-500/5 rounded-full pointer-events-none"></div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center text-red-400">
                                <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                            </div>
                            <h4 class="font-bold text-lg text-red-200">Cara Lama / Manual</h4>
                        </div>
                        <ul class="space-y-3 text-xs md:text-sm text-slate-300">
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-xmark text-red-400 mt-1 shrink-0"></i>
                                <span>Evaluasi bulanan dicatat di kertas formulir bertumpuk-tumpuk.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-xmark text-red-400 mt-1 shrink-0"></i>
                                <span>Proses rekapitulasi data nilai pegawai lambat & rawan kesalahan input.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-xmark text-red-400 mt-1 shrink-0"></i>
                                <span>Pegawai tidak tahu nilai mereka kecuali dipanggil atau mencetak fisik.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-xmark text-red-400 mt-1 shrink-0"></i>
                                <span>Biaya tinggi untuk pencetakan kertas dan waktu admin yang boros.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- SOLUSI (CARD INDIGO) -->
                    <div class="p-6 rounded-2xl bg-brand-950/20 border border-brand-500/20 relative overflow-hidden group">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-brand-500/5 rounded-full pointer-events-none"></div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-brand-500/10 flex items-center justify-center text-brand-300">
                                <i class="fa-solid fa-circle-check text-lg"></i>
                            </div>
                            <h4 class="font-bold text-lg text-brand-200">Solusi Modern EVAKIN</h4>
                        </div>
                        <ul class="space-y-3 text-xs md:text-sm text-slate-300">
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-emerald-400 mt-1 shrink-0"></i>
                                <span>Sistem input nilai digital mandiri yang super praktis.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-emerald-400 mt-1 shrink-0"></i>
                                <span>Penghitungan rata-rata nilai & status kinerja otomatis secara instan.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-emerald-400 mt-1 shrink-0"></i>
                                <span><strong>WhatsApp Gateway Otomatis</strong> mengirimkan nilai begitu difinalisasi.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-emerald-400 mt-1 shrink-0"></i>
                                <span>Ekspor laporan PDF & Excel berformat resmi dengan satu kali klik.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-6">
                    <button onclick="prevSlide()" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button onclick="nextSlide()" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-xs font-bold text-white shadow-lg flex items-center gap-2 hover:scale-[1.02] transition-all cursor-pointer">
                        Lanjut <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </section>

            <!-- ================= SLIDE 2: DEMO DASHBOARD ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="2" data-slide-title="Demo Dashboard">
                <div>
                    <h3 class="text-xs font-bold text-brand-400 uppercase tracking-widest mb-2"><i class="fa-solid fa-desktop mr-1"></i> Visualisasi & Dashboard</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white">Panel Penilaian Interaktif</h2>
                </div>

                <!-- SIMULATOR INTERAKTIF DASHBOARD -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 my-auto items-stretch h-[280px] md:h-[300px]">
                    <!-- Sisi Kiri: Daftar Pegawai -->
                    <div class="lg:col-span-4 bg-slate-900/60 border border-white/5 rounded-2xl p-4 overflow-y-auto flex flex-col gap-2">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Daftar Pegawai PPPK</p>
                        
                        <div onclick="selectDemoPegawai('naruto', 100.00, 2.00, 'Sesuai Ekspektasi', 'Operator Layanan Operasional - Tenaga Administrasi')" class="demo-pegawai-item p-3 rounded-xl bg-brand-500/10 border border-brand-500/30 cursor-pointer transition-all flex items-center justify-between" id="pegawai-naruto">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-amber-400 flex items-center justify-center text-slate-900 font-bold text-xs">NU</div>
                                <div class="text-left">
                                    <h5 class="text-xs font-bold text-white">Naruto Uzumaki</h5>
                                    <p class="text-[9px] text-slate-400">PPPK Administrasi</p>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-emerald-400">100.00</span>
                        </div>

                        <div onclick="selectDemoPegawai('sasuke', 86.50, 2.00, 'Sesuai Ekspektasi', 'PPPK Satpol PP')" class="demo-pegawai-item p-3 rounded-xl bg-white/5 border border-white/5 cursor-pointer transition-all flex items-center justify-between" id="pegawai-sasuke">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold text-xs">SU</div>
                                <div class="text-left">
                                    <h5 class="text-xs font-bold text-slate-300">Sasuke Uchiha</h5>
                                    <p class="text-[9px] text-slate-400">PPPK Satpol PP</p>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-slate-300">86.50</span>
                        </div>

                        <div onclick="selectDemoPegawai('sakura', 97.00, 3.00, 'Diatas Ekspektasi', 'PPPK Tenaga Kesehatan')" class="demo-pegawai-item p-3 rounded-xl bg-white/5 border border-white/5 cursor-pointer transition-all flex items-center justify-between" id="pegawai-sakura">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-pink-500 flex items-center justify-center text-white font-bold text-xs">SH</div>
                                <div class="text-left">
                                    <h5 class="text-xs font-bold text-slate-300">Sakura Haruno</h5>
                                    <p class="text-[9px] text-slate-400">PPPK Kesehatan</p>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-emerald-400">97.00</span>
                        </div>
                    </div>

                    <!-- Sisi Kanan: Panel Penilaian Pegawai Terpilih -->
                    <div class="lg:col-span-8 bg-slate-950/80 border border-white/5 rounded-2xl p-5 flex flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="px-2 py-0.5 rounded bg-brand-500/20 text-brand-300 text-[10px] font-bold uppercase tracking-wider" id="preview-pegawai-jabatan">Operator Layanan Operasional - Tenaga Administrasi</span>
                                <h4 class="text-lg font-bold text-white mt-1" id="preview-pegawai-name">Naruto Uzumaki</h4>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-semibold">Predikat Kinerja</p>
                                <span class="inline-block mt-1 px-3 py-1 rounded-full bg-amber-500/20 border border-amber-500/30 text-xs font-bold text-amber-400" id="preview-pegawai-predikat">Sesuai Ekspektasi</span>
                            </div>
                        </div>

                        <!-- Bar Chart & Nilai -->
                        <div class="grid grid-cols-2 gap-4 my-4">
                            <!-- Hasil Kerja -->
                            <div class="bg-white/5 p-3 rounded-xl border border-white/5">
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="text-slate-400">Hasil Kerja (Persen):</span>
                                    <span class="font-bold text-white"><span id="preview-pegawai-kerja">100.00</span>%</span>
                                </div>
                                <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-brand-500 to-brand-300 h-full rounded-full transition-all duration-500" id="bar-pegawai-kerja" style="width: 100%;"></div>
                                </div>
                            </div>
                            
                            <!-- Perilaku Kerja -->
                            <div class="bg-white/5 p-3 rounded-xl border border-white/5">
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="text-slate-400">Perilaku Kerja (Skala 1-3):</span>
                                    <span class="font-bold text-white"><span id="preview-pegawai-perilaku">2.00</span> / 3.00</span>
                                </div>
                                <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-cyan-500 to-cyan-300 h-full rounded-full transition-all duration-500" id="bar-pegawai-perilaku" style="width: 66.67%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Detail Rata-Rata -->
                        <div class="flex justify-between items-center p-3 rounded-xl bg-slate-900 border border-white/5">
                            <span class="text-xs text-slate-400"><i class="fa-solid fa-clipboard-check text-brand-400 mr-1.5"></i> Ringkasan Evaluasi Kinerja Bulanan:</span>
                            <span class="text-xs font-semibold text-slate-300">Hasil Kerja: <span id="preview-pegawai-hk-footer" class="font-black text-sm text-white">100.00</span>% | Perilaku: <span id="preview-pegawai-pk-footer" class="font-black text-sm text-white">2.00</span> / 3.00</span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-6">
                    <button onclick="prevSlide()" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button onclick="nextSlide()" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-xs font-bold text-white shadow-lg flex items-center gap-2 hover:scale-[1.02] transition-all cursor-pointer">
                        Lanjut <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </section>

            <!-- ================= SLIDE 3: WHATSAPP GATEWAY ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="3" data-slide-title="WhatsApp Gateway">
                <div>
                    <h3 class="text-xs font-bold text-emerald-400 uppercase tracking-widest mb-2"><i class="fa-brands fa-whatsapp mr-1"></i> WhatsApp Gateway</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white">Notifikasi Kinerja Instan</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 my-auto items-center">
                    <!-- Sisi Kiri: Kontrol & Penjelasan -->
                    <div class="space-y-4">
                        <p class="text-xs md:text-sm text-slate-300 leading-relaxed">
                            EVAKIN dilengkapi sistem notifikasi WhatsApp mandiri menggunakan pustaka <strong>Baileys (Node.js)</strong>. Layanan berjalan di latar belakang (background process) dan dikontrol langsung dari dashboard admin.
                        </p>
                        
                        <!-- Simulasi Form Kirim -->
                        <div class="p-4 rounded-xl bg-slate-900 border border-white/5 space-y-3">
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Coba Kirim Notifikasi Simulasi</label>
                            <div class="flex gap-2">
                                <input type="text" id="demo-wa-number" value="081234567890" class="flex-grow bg-slate-950 border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-brand-500 font-mono">
                                <button onclick="triggerWaSimulation()" class="bg-emerald-600 hover:bg-emerald-500 px-4 py-2 rounded-lg text-xs font-bold text-white transition-all hover:scale-[1.02] cursor-pointer">
                                    Kirim Uji Coba <i class="fa-solid fa-paper-plane ml-1"></i>
                                </button>
                            </div>
                            <span class="text-[9px] text-slate-500 block"><i class="fa-solid fa-info-circle mr-1"></i> Klik tombol untuk melihat visualisasi pengiriman di HP sebelah kanan.</span>
                        </div>
                    </div>

                    <!-- Sisi Kanan: Simulasi HP WhatsApp -->
                    <div class="w-full max-w-[280px] h-[300px] bg-slate-950 border-[6px] border-slate-800 rounded-3xl mx-auto overflow-hidden flex flex-col shadow-2xl relative">
                        <!-- Header HP WA -->
                        <div class="bg-[#075e54] p-3 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-arrow-left text-white text-xs"></i>
                                <div class="w-7 h-7 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-800 text-[10px]">EK</div>
                                <div class="text-left">
                                    <h5 class="text-[10px] font-bold text-white leading-none">E-KINERJA</h5>
                                    <p class="text-[8px] text-emerald-200 leading-none mt-1">online</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 text-white text-xs">
                                <i class="fa-solid fa-video"></i>
                                <i class="fa-solid fa-phone"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>

                        <!-- Chat Area HP WA -->
                        <div class="flex-grow p-3 overflow-y-auto space-y-3 bg-[#efeae2] flex flex-col justify-end" id="wa-chat-container">
                            <div class="bg-white p-2.5 rounded-lg border border-slate-200 max-w-[85%] self-start text-[9px] text-slate-800 shadow-sm leading-normal">
                                Halo! Selamat datang di simulasi WhatsApp Gateway EVAKIN. Silakan ketik nomor Anda di sebelah kiri lalu tekan tombol "Kirim Uji Coba".
                            </div>
                            
                            <!-- Mockup bubble chat yang akan muncul dinamis -->
                            <div class="hidden bg-[#d9fdd3] p-2.5 rounded-lg border border-emerald-200 max-w-[85%] self-end text-[8.5px] text-slate-900 shadow-sm leading-normal font-sans" id="wa-bubble-sim">
                                <p>Halo *<strong>Naruto Uzumaki</strong>*,</p>
                                <p class="my-1.5">Evaluasi Kinerja Anda untuk bulan *<strong>Mei 2026</strong>* telah selesai dinilai dan di- *<strong>FINALISASI</strong>* oleh Pejabat Penilai.</p>
                                <p class="my-1.5">Silakan cek detailnya di aplikasi <strong>EVAKIN</strong>:<br><a href="#" class="text-blue-600 underline">http://evakin.questkomapp.com/login</a></p>
                                <p>Terima kasih.</p>
                            </div>

                            <!-- Indicator Typing -->
                            <div class="hidden self-start bg-white px-3 py-1.5 rounded-lg text-[9px] text-slate-500 italic shadow-sm" id="wa-typing-indicator">
                                E-KINERJA sedang mengetik...
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-6">
                    <button onclick="prevSlide()" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button onclick="nextSlide()" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-xs font-bold text-white shadow-lg flex items-center gap-2 hover:scale-[1.02] transition-all cursor-pointer">
                        Lanjut <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </section>

            <!-- ================= SLIDE 4: WHITE-LABEL BRANDING ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="4" data-slide-title="White-Label">
                <div>
                    <h3 class="text-xs font-bold text-pink-400 uppercase tracking-widest mb-2"><i class="fa-solid fa-palette mr-1"></i> White-Label Branding</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white">Sesuaikan Identitas Instansi Anda</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 my-auto items-center">
                    <!-- Sisi Kiri: Live Customizer Panel -->
                    <div class="bg-slate-900/60 border border-white/5 rounded-2xl p-5 space-y-4">
                        <h4 class="font-bold text-sm text-white border-b border-white/5 pb-2"><i class="fa-solid fa-sliders text-pink-400 mr-1.5"></i> Live Customizer (Simulasi)</h4>
                        
                        <!-- App Name Input -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nama Aplikasi</label>
                            <input type="text" id="custom-app-name" value="{{ get_setting('app_name', 'EVAKIN') }}" oninput="updateLiveBranding()" class="w-full bg-slate-950 border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-pink-500">
                        </div>

                        <!-- Organization Name Input -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nama Organisasi</label>
                            <input type="text" id="custom-org-name" value="{{ get_setting('organization_name', 'Pemerintah Daerah') }}" oninput="updateLiveBranding()" class="w-full bg-slate-950 border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-pink-500">
                        </div>

                        <!-- Color Presets -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Preset Warna Dashboard</label>
                            <div class="flex gap-2">
                                <button onclick="changeLiveColor('indigo', 'from-indigo-600 to-indigo-500', 'bg-indigo-500/10 border-indigo-500/20')" class="px-2.5 py-1.5 rounded bg-indigo-600 text-white text-[10px] font-bold cursor-pointer">Indigo</button>
                                <button onclick="changeLiveColor('emerald', 'from-emerald-600 to-emerald-500', 'bg-emerald-500/10 border-emerald-500/20')" class="px-2.5 py-1.5 rounded bg-emerald-600 text-white text-[10px] font-bold cursor-pointer">Emerald</button>
                                <button onclick="changeLiveColor('amber', 'from-amber-600 to-amber-500', 'bg-amber-500/10 border-amber-500/20')" class="px-2.5 py-1.5 rounded bg-amber-600 text-slate-950 text-[10px] font-bold cursor-pointer">Amber</button>
                                <button onclick="changeLiveColor('rose', 'from-rose-600 to-rose-500', 'bg-rose-500/10 border-rose-500/20')" class="px-2.5 py-1.5 rounded bg-rose-600 text-white text-[10px] font-bold cursor-pointer">Rose</button>
                            </div>
                        </div>
                    </div>

                    <!-- Sisi Kanan: Mini Dashboard Preview -->
                    <div class="bg-slate-950 border border-white/10 rounded-2xl p-4 shadow-2xl space-y-3">
                        <div class="flex justify-between items-center border-b border-white/5 pb-2">
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Preview Aplikasi Real-Time</span>
                            <div class="flex gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            </div>
                        </div>

                        <!-- Mini Layout -->
                        <div class="grid grid-cols-12 gap-2 h-[160px]">
                            <!-- Mini Sidebar -->
                            <div class="col-span-4 bg-slate-900 rounded-lg p-2 flex flex-col gap-1.5">
                                <div class="flex items-center gap-1 mb-2">
                                    <div id="live-preview-logo-box" class="w-4 h-4 rounded bg-gradient-to-tr from-brand-500 to-cyan-400"></div>
                                    <span id="live-preview-app-name" class="text-[9px] font-bold text-white truncate">EVAKIN</span>
                                </div>
                                <div class="h-2 rounded bg-white/10 w-full"></div>
                                <div class="h-2 rounded bg-white/5 w-4/5"></div>
                                <div class="h-2 rounded bg-white/5 w-3/4"></div>
                            </div>
                            
                            <!-- Mini Content -->
                            <div class="col-span-8 bg-slate-900/40 rounded-lg p-3 space-y-2">
                                <div class="flex justify-between items-center">
                                    <span id="live-preview-org-name" class="text-[8px] text-slate-400 font-medium uppercase tracking-wider">Pemda Konoha</span>
                                    <span class="w-3 h-3 rounded-full bg-slate-700"></span>
                                </div>

                                <div id="live-preview-hero-card" class="p-2 rounded bg-brand-500/10 border border-brand-500/20 text-center space-y-1">
                                    <p class="text-[8px] text-slate-300 leading-none">Selamat Datang di Portal Evaluasi</p>
                                    <h5 class="text-[10px] font-extrabold text-white">Sistem Kinerja PPPK</h5>
                                </div>

                                <div class="grid grid-cols-2 gap-1.5">
                                    <div class="bg-white/5 p-1.5 rounded text-[8px] text-center border border-white/5 text-slate-400">Total Pegawai<br><strong class="text-white">124</strong></div>
                                    <div class="bg-white/5 p-1.5 rounded text-[8px] text-center border border-white/5 text-slate-400">Terkirim WA<br><strong class="text-white">100%</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-6">
                    <button onclick="prevSlide()" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button onclick="nextSlide()" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-xs font-bold text-white shadow-lg flex items-center gap-2 hover:scale-[1.02] transition-all cursor-pointer">
                        Lanjut <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </section>

            <!-- ================= SLIDE 5: MANAJEMEN PEGAWAI ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="5" data-slide-title="Penilaian PPPK">
                <div>
                    <h3 class="text-xs font-bold text-brand-400 uppercase tracking-widest mb-2"><i class="fa-solid fa-users mr-1"></i> Penilaian Pegawai PPPK</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white">Struktur Data & Kriteria Penilaian</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-auto">
                    <!-- Struktur Data Pegawai -->
                    <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-3">
                        <h4 class="font-bold text-sm text-white flex items-center gap-2"><i class="fa-solid fa-sitemap text-brand-400"></i> Struktur & Data Entitas</h4>
                        <p class="text-xs text-slate-400">EVAKIN memiliki database terstruktur untuk memastikan manajemen data pegawai berjalan rapi:</p>
                        
                        <div class="space-y-2 text-xs text-slate-300">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-angle-right text-brand-400"></i> <span><strong>Data Jabatan</strong>: Nama jabatan, kelas, dan kriteria tugas.</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-angle-right text-brand-400"></i> <span><strong>Data Pegawai</strong>: NIP/NIK, nama, jabatan, unit kerja, nomor WA.</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-angle-right text-brand-400"></i> <span><strong>Pejabat Penilai</strong>: Administrator/Atasan langsung yang menginput nilai.</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-angle-right text-brand-400"></i> <span><strong>Indikator Kinerja</strong>: Variabel pengukur kerja bulanan secara objektif.</span></div>
                        </div>
                    </div>

                    <!-- Kriteria Evaluasi Nilai -->
                    <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-3">
                        <h4 class="font-bold text-sm text-white flex items-center gap-2"><i class="fa-solid fa-star text-brand-400"></i> Komponen Penilaian Bulanan</h4>
                        <p class="text-xs text-slate-400">Penilaian bulanan didasarkan pada dua komponen utama sesuai peraturan aparatur negara:</p>
                        
                        <div class="space-y-2 text-xs text-slate-300">
                            <div class="bg-slate-900/60 p-2.5 rounded-lg border border-white/5 flex gap-3">
                                <i class="fa-solid fa-briefcase text-cyan-400 text-sm mt-0.5"></i>
                                <div>
                                    <h5 class="font-bold text-white text-[11px]">1. Hasil Kerja (Bobot 60%)</h5>
                                    <p class="text-[10px] text-slate-400">Menilai aspek kuantitas, kualitas hasil kerja, dan ketepatan waktu penyelesaian tugas.</p>
                                </div>
                            </div>
                            
                            <div class="bg-slate-900/60 p-2.5 rounded-lg border border-white/5 flex gap-3">
                                <i class="fa-solid fa-heart text-pink-400 text-sm mt-0.5"></i>
                                <div>
                                    <h5 class="font-bold text-white text-[11px]">2. Perilaku Kerja (Bobot 40%)</h5>
                                    <p class="text-[10px] text-slate-400">Menilai etika berorientasi pelayanan, integritas, komitmen kerja, dan kerja sama tim.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-6">
                    <button onclick="prevSlide()" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button onclick="nextSlide()" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-xs font-bold text-white shadow-lg flex items-center gap-2 hover:scale-[1.02] transition-all cursor-pointer">
                        Lanjut <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </section>

            <!-- ================= SLIDE 6: EXPORT LAPORAN ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="6" data-slide-title="Ekspor PDF/Excel">
                <div>
                    <h3 class="text-xs font-bold text-brand-400 uppercase tracking-widest mb-2"><i class="fa-solid fa-file-export mr-1"></i> Ekspor Laporan</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white">Ekspor Fleksibel dengan Satu Kali Klik</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-auto">
                    <!-- Simulasi File PDF -->
                    <div class="p-5 rounded-2xl bg-white/5 border border-white/5 flex flex-col justify-between h-[230px]">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-sm text-white flex items-center gap-2"><i class="fa-solid fa-file-pdf text-red-400 text-lg"></i> Format Laporan PDF</h4>
                                <span class="px-2 py-0.5 rounded bg-red-500/10 border border-red-500/20 text-[9px] font-bold text-red-400">Resmi</span>
                            </div>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                Dokumen PDF dicetak dalam tata letak (layout) lembar evaluasi resmi pemerintah daerah yang bersih dan profesional, lengkap dengan logo daerah dan rincian tabel nilai untuk kebutuhan pengarsipan fisik.
                            </p>
                        </div>
                        <button onclick="simulateDownload('pdf')" class="w-full py-2 bg-slate-900 border border-white/10 hover:border-red-500/30 text-xs font-bold text-slate-200 rounded-xl hover:bg-slate-800 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-download text-red-400"></i> Unduh Simulasi PDF
                        </button>
                    </div>

                    <!-- Simulasi File Excel -->
                    <div class="p-5 rounded-2xl bg-white/5 border border-white/5 flex flex-col justify-between h-[230px]">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-sm text-white flex items-center gap-2"><i class="fa-solid fa-file-excel text-emerald-400 text-lg"></i> Format Rekapitulasi Excel</h4>
                                <span class="px-2 py-0.5 rounded bg-emerald-500/10 border border-emerald-500/20 text-[9px] font-bold text-emerald-400">Rekap</span>
                            </div>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                Membantu tim administrator mengunduh rekapitulasi data nilai seluruh pegawai dalam bentuk spreadsheet Excel. Lengkap dengan pewarnaan tabel (conditional styling) dan penghitungan otomatis untuk pengarsipan.
                            </p>
                        </div>
                        <button onclick="simulateDownload('excel')" class="w-full py-2 bg-slate-900 border border-white/10 hover:border-emerald-500/30 text-xs font-bold text-slate-200 rounded-xl hover:bg-slate-800 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-download text-emerald-400"></i> Unduh Simulasi Excel
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-6">
                    <button onclick="prevSlide()" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button onclick="nextSlide()" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-xs font-bold text-white shadow-lg flex items-center gap-2 hover:scale-[1.02] transition-all cursor-pointer">
                        Lanjut <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </section>

            <!-- ================= SLIDE 7: ARSITEKTUR & INSTALASI ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="7" data-slide-title="Arsitektur & Instalan">
                <div>
                    <h3 class="text-xs font-bold text-brand-400 uppercase tracking-widest mb-2"><i class="fa-solid fa-server mr-1"></i> Arsitektur & Teknologi</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white">Struktur Aplikasi & Langkah Instalasi Cepat</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 my-auto items-stretch h-[280px] md:h-[300px]">
                    <!-- Sisi Kiri: Tech Stack List -->
                    <div class="bg-slate-900/60 border border-white/5 rounded-2xl p-4 flex flex-col justify-between text-xs">
                        <p class="font-bold text-slate-400 uppercase tracking-wider mb-2">Stack Teknologi Modern</p>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white/5 p-2 rounded-lg flex items-center gap-2">
                                <i class="fa-brands fa-laravel text-red-500 text-base"></i>
                                <span>Laravel 11+</span>
                            </div>
                            <div class="bg-white/5 p-2 rounded-lg flex items-center gap-2">
                                <i class="fa-brands fa-node-js text-emerald-500 text-base"></i>
                                <span>Node.js >= 18</span>
                            </div>
                            <div class="bg-white/5 p-2 rounded-lg flex items-center gap-2">
                                <i class="fa-solid fa-database text-blue-400 text-base"></i>
                                <span>MySQL / MariaDB</span>
                            </div>
                            <div class="bg-white/5 p-2 rounded-lg flex items-center gap-2">
                                <i class="fa-brands fa-js text-yellow-400 text-base"></i>
                                <span>Baileys Gateway</span>
                            </div>
                        </div>

                        <div class="p-3 bg-brand-500/10 border border-brand-500/20 rounded-xl mt-3 text-[11px] text-brand-300">
                            <strong><i class="fa-solid fa-circle-info"></i> Keunggulan Developer:</strong><br>
                            Struktur kode bersih dengan prinsip modular MVC Laravel memudahkan pemeliharaan jangka panjang dan kustomisasi.
                        </div>
                    </div>

                    <!-- Sisi Kanan: Terminal Instalasi -->
                    <div class="bg-slate-950 border border-white/10 rounded-2xl p-4 font-mono text-[10px] md:text-xs flex flex-col justify-between relative shadow-2xl">
                        <div class="flex justify-between items-center text-slate-500 border-b border-white/5 pb-2 mb-2">
                            <span><i class="fa-solid fa-terminal mr-2"></i> terminal - install.sh</span>
                            <div class="flex gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-slate-800"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-slate-800"></span>
                            </div>
                        </div>
                        
                        <div class="flex-grow space-y-2 text-slate-300 overflow-y-auto">
                            <p class="text-slate-500"># 1. Clone & Masuk Direktori</p>
                            <p class="text-brand-300 flex justify-between items-center">
                                <span>git clone https://github.com/.../evakin.git</span>
                                <i onclick="copyCodeText('git clone https://github.com/ridyko/Evaluasi-Kinerja-PPPK-Paruh-Waktu.git')" class="fa-solid fa-copy cursor-pointer text-slate-500 hover:text-white transition-all"></i>
                            </p>
                            
                            <p class="text-slate-500"># 2. Install PHP Dependencies</p>
                            <p class="text-brand-300 flex justify-between items-center">
                                <span>composer install</span>
                                <i onclick="copyCodeText('composer install')" class="fa-solid fa-copy cursor-pointer text-slate-500 hover:text-white transition-all"></i>
                            </p>

                            <p class="text-slate-500"># 3. Jalankan Migrasi & Database Seeder</p>
                            <p class="text-brand-300 flex justify-between items-center">
                                <span>php artisan migrate --seed</span>
                                <i onclick="copyCodeText('php artisan migrate --seed')" class="fa-solid fa-copy cursor-pointer text-slate-500 hover:text-white transition-all"></i>
                            </p>
                        </div>
                        
                        <span class="text-[9px] text-slate-500 text-right mt-2"><i class="fa-solid fa-check-double text-emerald-400 mr-1"></i> Plug and Play!</span>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-6">
                    <button onclick="prevSlide()" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button onclick="nextSlide()" class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-xs font-bold text-white shadow-lg flex items-center gap-2 hover:scale-[1.02] transition-all cursor-pointer">
                        Lanjut <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </section>

            <!-- ================= SLIDE 8: HUBUNGI DEVELOPER / CTA ================= -->
            <section class="slide-item absolute inset-0 p-8 md:p-12 flex flex-col justify-between transition-all duration-500 opacity-0 pointer-events-none" data-slide-index="8" data-slide-title="Hubungi Developer">
                <div class="flex-grow flex flex-col justify-center items-center text-center mt-4">
                    <div class="w-16 h-16 rounded-3xl bg-gradient-to-tr from-brand-600 to-cyan-400 flex items-center justify-center shadow-xl shadow-brand-500/20 mb-6 scale-[1.05]">
                        <i class="fa-solid fa-wallet text-white text-3xl"></i>
                    </div>

                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">Siap Mengimplementasikan EVAKIN?</h2>
                    
                    <p class="text-xs md:text-sm text-slate-300 max-w-xl leading-relaxed mb-8">
                        Dapatkan paket source code lengkap, petunjuk instalasi lengkap, basis data sql, beserta dukungan teknis integrasi WhatsApp Gateway mandiri sekarang juga.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 w-full justify-center max-w-md">
                        <!-- Direct Link to Login / Live Demo -->
                        <a href="{{ route('login') }}" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 font-bold text-sm text-white shadow-lg flex items-center justify-center gap-2 transition-all hover:scale-[1.02] cursor-pointer">
                            <i class="fa-solid fa-rocket"></i> Coba Demo Aplikasi
                        </a>
                        
                        <!-- Contact Developer -->
                        <a href="https://wa.me/6287798882268?text=Halo,%20saya%20tertarik%20dengan%20aplikasi%20EVAKIN" target="_blank" class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 font-bold text-sm text-white shadow-lg flex items-center justify-center gap-2 transition-all hover:scale-[1.02] cursor-pointer">
                            <i class="fa-brands fa-whatsapp"></i> Hubungi Pengembang
                        </a>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-6">
                    <button onclick="prevSlide()" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button onclick="goToSlide(0)" class="px-6 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs font-semibold text-slate-300 hover:bg-slate-800 transition-all cursor-pointer">
                        <i class="fa-solid fa-rotate-right mr-2"></i> Ulangi Presentasi
                    </button>
                </div>
            </section>

        </div>
    </main>

    <!-- FOOTER / PROGRESS BAR & SHORTCUTS -->
    <footer class="relative z-50 px-6 py-4 glass-panel border-t border-white/5 mx-4 mb-4 rounded-2xl flex flex-col md:flex-row justify-between items-center gap-4">
        
        <!-- PROGRESS LINE BAR -->
        <div class="w-full md:max-w-xs space-y-1.5 flex-grow">
            <div class="flex justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                <span>Kemajuan Presentasi</span>
                <span id="progress-percent">0%</span>
            </div>
            <div class="w-full bg-slate-900 h-1.5 rounded-full overflow-hidden border border-white/5">
                <div class="bg-gradient-to-r from-brand-500 to-cyan-400 h-full rounded-full transition-all duration-300" id="progress-bar-indicator" style="width: 0%;"></div>
            </div>
        </div>

        <!-- KEYBOARD SHORTCUTS INFO -->
        <div class="flex gap-4 items-center text-xs text-slate-400">
            <span class="flex items-center gap-1.5">
                Navigasi Keyboard: 
                <kbd class="key-badge px-2 py-0.5 rounded text-[10px] text-white font-mono"><i class="fa-solid fa-arrow-left"></i></kbd>
                <kbd class="key-badge px-2 py-0.5 rounded text-[10px] text-white font-mono"><i class="fa-solid fa-arrow-right"></i></kbd>
                <kbd class="key-badge px-4 py-0.5 rounded text-[10px] text-white font-mono">Spasi</kbd>
            </span>
        </div>

        <div class="text-[10px] text-slate-500 font-medium">
            &copy; 2026 E-Kinerja Daerah. All rights reserved.
        </div>
    </footer>

    <!-- LIVE POP-UP ALERT TOAST (SIMULATION) -->
    <div id="toast-alert" class="fixed bottom-24 right-6 z-[999] p-4 rounded-2xl bg-slate-900/90 border border-brand-500/20 shadow-2xl glass-panel translate-y-12 opacity-0 pointer-events-none transition-all duration-300 flex items-center gap-3 max-w-sm">
        <div class="w-8 h-8 rounded-xl bg-brand-500/10 flex items-center justify-center text-brand-400 shrink-0">
            <i class="fa-solid fa-sparkles text-sm"></i>
        </div>
        <p class="text-xs text-slate-300 font-medium" id="toast-message">Notifikasi berhasil disimulasikan!</p>
    </div>

    <!-- PRESENTATION BUSINESS LOGIC SCRIPTS -->
    <script>
        let currentSlide = 0;
        const totalSlides = 9;

        const slides = document.querySelectorAll('.slide-item');
        const sidebarBtns = document.querySelectorAll('.slide-menu-btn');
        const currentSlideNumSpan = document.getElementById('current-slide-num');
        const currentSlideTitleSpan = document.getElementById('current-slide-title');
        const progressBarIndicator = document.getElementById('progress-bar-indicator');
        const progressPercentSpan = document.getElementById('progress-percent');
        const toast = document.getElementById('toast-alert');
        const toastMessage = document.getElementById('toast-message');

        // Initialize Slides
        function initSlides() {
            slides.forEach((slide, idx) => {
                if (idx === currentSlide) {
                    slide.classList.remove('opacity-0', 'pointer-events-none');
                    slide.classList.add('opacity-100');
                    currentSlideNumSpan.textContent = idx + 1;
                    currentSlideTitleSpan.textContent = slide.getAttribute('data-slide-title');
                } else {
                    slide.classList.remove('opacity-100');
                    slide.classList.add('opacity-0', 'pointer-events-none');
                }
            });

            // Update Sidebar buttons style
            sidebarBtns.forEach((btn) => {
                const targetIdx = parseInt(btn.getAttribute('data-slide'));
                if (targetIdx === currentSlide) {
                    btn.classList.add('bg-brand-500/15', 'text-brand-300', 'border-brand-500/30', 'border');
                    btn.classList.remove('text-slate-400', 'border-transparent');
                } else {
                    btn.classList.remove('bg-brand-500/15', 'text-brand-300', 'border-brand-500/30', 'border');
                    btn.classList.add('text-slate-400');
                }
            });

            // Update progress line
            const percentage = Math.round((currentSlide / (totalSlides - 1)) * 100);
            progressBarIndicator.style.width = `${percentage}%`;
            progressPercentSpan.textContent = `${percentage}%`;
        }

        // Navigation controls
        function goToSlide(index) {
            if (index >= 0 && index < totalSlides) {
                currentSlide = index;
                initSlides();
            }
        }

        function nextSlide() {
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
                initSlides();
            }
        }

        function prevSlide() {
            if (currentSlide > 0) {
                currentSlide--;
                initSlides();
            }
        }

        // Keyboard navigation listener
        window.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight' || e.key === ' ') {
                e.preventDefault();
                nextSlide();
            } else if (e.key === 'ArrowLeft') {
                e.preventDefault();
                prevSlide();
            }
        });

        // ================= SLIDE 2: DEMO DASHBOARD LOGIC =================
        function selectDemoPegawai(id, kerja, perilaku, predikat, jabatan) {
            // Update Active list item styling
            document.querySelectorAll('.demo-pegawai-item').forEach(item => {
                item.classList.remove('bg-brand-500/10', 'border-brand-500/30');
                item.classList.add('bg-white/5', 'border-white/5');
            });
            const activeItem = document.getElementById(`pegawai-${id}`);
            activeItem.classList.remove('bg-white/5', 'border-white/5');
            activeItem.classList.add('bg-brand-500/10', 'border-brand-500/30');

            // Update preview details
            document.getElementById('preview-pegawai-name').textContent = activeItem.querySelector('h5').textContent;
            document.getElementById('preview-pegawai-jabatan').textContent = jabatan;
            document.getElementById('preview-pegawai-kerja').textContent = kerja.toFixed(2);
            document.getElementById('preview-pegawai-perilaku').textContent = perilaku.toFixed(2);
            document.getElementById('preview-pegawai-predikat').textContent = predikat;

            // Update predikat badge classes
            const predikatBadge = document.getElementById('preview-pegawai-predikat');
            if (predikat === 'Diatas Ekspektasi') {
                predikatBadge.className = 'inline-block mt-1 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-500/30 text-xs font-bold text-emerald-400';
            } else if (predikat === 'Sesuai Ekspektasi') {
                predikatBadge.className = 'inline-block mt-1 px-3 py-1 rounded-full bg-amber-500/20 border border-amber-500/30 text-xs font-bold text-amber-400';
            } else {
                predikatBadge.className = 'inline-block mt-1 px-3 py-1 rounded-full bg-red-500/20 border border-red-500/30 text-xs font-bold text-red-400';
            }

            // Update footer info
            document.getElementById('preview-pegawai-hk-footer').textContent = kerja.toFixed(2);
            document.getElementById('preview-pegawai-pk-footer').textContent = perilaku.toFixed(2);

            // Update Progress bars width
            document.getElementById('bar-pegawai-kerja').style.width = `${kerja}%`;
            
            // Perilaku is out of 3.00 (scale to 100% logic: (val/3)*100)
            const perilakuPercent = (perilaku / 3) * 100;
            document.getElementById('bar-pegawai-perilaku').style.width = `${perilakuPercent}%`;

            // Trigger soundless alert
            showToast(`Menampilkan evaluasi kinerja untuk: ${activeItem.querySelector('h5').textContent}`);
        }

        // ================= SLIDE 3: WHATSAPP GATEWAY LOGIC =================
        function triggerWaSimulation() {
            const number = document.getElementById('demo-wa-number').value;
            if (!number) {
                showToast("Silakan masukkan nomor WhatsApp simulasi terlebih dahulu!");
                return;
            }

            const typing = document.getElementById('wa-typing-indicator');
            const bubble = document.getElementById('wa-bubble-sim');
            const chatContainer = document.getElementById('wa-chat-container');

            // Reset state
            bubble.classList.add('hidden');
            typing.classList.remove('hidden');
            
            // Auto scroll chat mockup to bottom
            chatContainer.scrollTop = chatContainer.scrollHeight;

            setTimeout(() => {
                typing.classList.add('hidden');
                bubble.classList.remove('hidden');
                
                // Set recipient name in bubble message
                const currentActivePegawaiName = document.getElementById('preview-pegawai-name').textContent;
                const currentActiveKerja = parseFloat(document.getElementById('preview-pegawai-kerja').textContent).toFixed(2);
                const currentActivePerilaku = parseFloat(document.getElementById('preview-pegawai-perilaku').textContent).toFixed(2);
                const currentActivePredikat = document.getElementById('preview-pegawai-predikat').textContent;
                
                bubble.innerHTML = `
                    <p>Halo *<strong>${currentActivePegawaiName}</strong>*,</p>
                    <p class="my-1.5">Evaluasi Kinerja Anda untuk bulan *<strong>Mei 2026</strong>* telah selesai dinilai dan di- *<strong>FINALISASI</strong>* oleh Pejabat Penilai.</p>
                    <p class="my-1.5">Silakan cek detailnya di aplikasi <strong>EVAKIN</strong>:<br><a href="#" class="text-blue-600 underline">http://evakin.questkomapp.com/login</a></p>
                    <p>Terima kasih.</p>
                `;

                chatContainer.scrollTop = chatContainer.scrollHeight;
                showToast(`🔔 Simulasi WA Terkirim ke nomor ${number}!`);
            }, 1500);
        }

        // ================= SLIDE 4: WHITE-LABEL BRANDING LOGIC =================
        function updateLiveBranding() {
            const appNameVal = document.getElementById('custom-app-name').value;
            const orgNameVal = document.getElementById('custom-org-name').value;

            // Update live mini previews
            document.getElementById('live-preview-app-name').textContent = appNameVal;
            document.getElementById('live-preview-org-name').textContent = orgNameVal;
        }

        function changeLiveColor(preset, gradientClasses, cardClasses) {
            const logoBox = document.getElementById('live-preview-logo-box');
            const heroCard = document.getElementById('live-preview-hero-card');

            // Reset classes
            logoBox.className = "w-4 h-4 rounded bg-gradient-to-tr " + gradientClasses;
            heroCard.className = "p-2 rounded text-center space-y-1 " + cardClasses;

            showToast(`Preset warna diubah ke: ${preset.toUpperCase()}`);
        }

        // ================= SLIDE 6 & 7: MISC SIMULATION LOGIC =================
        function simulateDownload(format) {
            showToast(`💾 Simulasi: Mengunduh lembar rekapitulasi data format .${format}...`);
            setTimeout(() => {
                showToast(`✨ File ${format.toUpperCase()} simulasi berhasil diunduh secara instan!`);
            }, 1000);
        }

        function copyCodeText(text) {
            navigator.clipboard.writeText(text);
            showToast("📋 Teks perintah berhasil disalin ke clipboard!");
        }

        // Toast Message Utility
        function showToast(message) {
            toastMessage.textContent = message;
            toast.classList.remove('translate-y-12', 'opacity-0', 'pointer-events-none');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-12', 'opacity-0', 'pointer-events-none');
            }, 3000);
        }

        // Initialize presentation on load
        window.addEventListener('DOMContentLoaded', () => {
            initSlides();
        });
    </script>
</body>
</html>
