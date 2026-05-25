<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — E-Kinerja Pemerintah Daerah Konoha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        /* RESET & JURUS PAKSA SCROLL */
        html, body {
            height: auto !important;
            min-height: 100vh !important;
            overflow-y: auto !important; /* Paksa scroll vertikal aktif */
            margin: 0;
            padding: 0;
            background: #0f172a;
            color: #f1f5f9;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; /* Konten mulai dari atas agar bisa panjang ke bawah */
            padding: 40px 20px !important; /* Ruang atas bawah agar bisa di-scroll */
        }

        /* BACKGROUND ANIMATION (Tetap Fixed) */
        body::before, body::after {
            content: '';
            position: fixed;
            z-index: -1;
            pointer-events: none;
        }
        body::before {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
            top: -100px; right: -100px;
        }
        body::after {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.08) 0%, transparent 70%);
            bottom: -100px; left: -100px;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            z-index: 10;
        }

        /* HEADER & LOGO ASLI */
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-logo {
            width: 72px; height: 72px;
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.25rem;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
            overflow: hidden; /* Pastikan logo tidak keluar dari border radius */
        }
        /* Style untuk menampilkan logo gambar asli */
        .login-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Logo memenuhi kotak dengan rapi */
        }
        
        .login-header h1 {
            font-size: 1.75rem; font-weight: 800; margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #c7d2fe, #67e8f9);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .login-header p { color: #94a3b8; font-size: 0.9rem; line-height: 1.5; }

        /* CARD LOGIN */
        .login-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 2.25rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            margin-bottom: 1.5rem;
        }

        .form-group { margin-bottom: 1.25rem; }
        .form-label { display: block; font-size: 0.8rem; font-weight: 600; color: #94a3b8; margin-bottom: 0.5rem; }
        
        .input-wrapper { position: relative; }
        .input-wrapper i { position: absolute; left: 1.1rem; top: 50%; transform: translateY(-50%); color: #475569; font-size: 0.9rem; }
        
        .form-input {
            width: 100%; padding: 0.8rem 1rem 0.8rem 3rem;
            background: rgba(15, 23, 42, 0.5); border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px; color: #fff; font-size: 0.95rem; outline: none; box-sizing: border-box; transition: 0.2s;
        }
        .form-input:focus { border-color: #6366f1; background: rgba(15, 23, 42, 0.8); }

        .btn-login {
            width: 100%; padding: 0.9rem;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff; border: none; border-radius: 12px;
            font-size: 1rem; font-weight: 700; cursor: pointer; transition: 0.3s; margin-top: 1rem;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4); }

        /* DEMO SECTION (Dibuat ringkas agar muat semua) */
        .demo-accounts {
            background: rgba(30, 41, 59, 0.4);
            border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1.5rem;
        }
        .demo-accounts h2 { font-size: 0.8rem; color: #64748b; text-align: center; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px; }
        
        .demo-item {
            display: flex; justify-content: space-between; align-items: center;
            padding: 0.75rem 1rem; background: rgba(15, 23, 42, 0.3);
            border-radius: 10px; margin-bottom: 0.6rem; cursor: pointer;
            transition: 0.2s; border: 1px solid transparent;
        }
        .demo-item:hover { background: rgba(99, 102, 241, 0.1); border-color: rgba(99, 102, 241, 0.2); }
        .demo-label { color: #818cf8; font-weight: 700; font-size: 0.8rem; }
        .demo-value { color: #cbd5e1; font-family: monospace; font-size: 0.8rem; }

        .login-footer {
            text-align: center; margin-top: 2rem; color: #475569; font-size: 0.75rem; padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">
                <img src="{{ asset(get_setting('app_logo')) }}" alt="Logo">
            </div>
            <h1>E-Kinerja Konoha</h1>
            <p>Sistem Evaluasi Kinerja Pegawai<br>Pemerintah Daerah Konoha</p>
        </div>

        <div class="login-card">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" class="form-input" id="emailInput" placeholder="admin@konoha.test" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" class="form-input" id="passwordInput" placeholder="••••••••" required>
                    </div>
                </div>

                <div style="margin: 1.5rem 0; display: flex; align-items: center; gap: 0.6rem;">
                    <input type="checkbox" name="remember" id="remember" style="accent-color: #6366f1; width: 16px; height: 16px; cursor: pointer;">
                    <label for="remember" style="font-size: 0.85rem; color: #94a3b8; cursor: pointer;">Ingat saya</label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>
            </form>
        </div>

        <div class="demo-accounts">
            <h2>Akun Uji Coba</h2>
            <div class="demo-item" onclick="fillLogin('admin@konoha.test', 'password')">
                <span class="demo-label">Admin:</span>
                <span class="demo-value">admin@konoha.test</span>
            </div>
            <div class="demo-item" onclick="fillLogin('pejabat@konoha.test', 'password')">
                <span class="demo-label">Penilai:</span>
                <span class="demo-value">pejabat@konoha.test</span>
            </div>
            <div class="demo-item" onclick="fillLogin('naruto@konoha.test', '199001012024211001')">
                <span class="demo-label">Pegawai:</span>
                <span class="demo-value">naruto@konoha.test</span>
            </div>
        </div>

        <div class="login-footer">
            &copy; 2026 E-Kinerja Pemerintah Daerah Konoha. All rights reserved.
        </div>
    </div>

    <script>
        function fillLogin(email, password) {
            document.getElementById('emailInput').value = email;
            document.getElementById('passwordInput').value = password;
            document.getElementById('emailInput').focus();
        }
    </script>
</body>
</html>