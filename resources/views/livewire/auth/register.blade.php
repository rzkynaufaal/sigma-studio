<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register — Sigma Studio</title>
    
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Variabel warna gold theme */
        :root {
            --gold-primary: #D4AF37;
            --gold-secondary: #B8860B;
            --gold-light: #F5E8B8;
            --gold-dark: #8B7500;
            --black-dark: #0A0A0A;
            --black-medium: #1A1A1A;
            --black-light: #2A2A2A;
            --text-light: #E5E5E5;
            --text-muted: #A0A0A0;
        }
        
        /* Animasi tambahan */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        @keyframes shimmer {
            0% {
                background-position: -200px 0;
            }
            100% {
                background-position: 200px 0;
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .gradient-border {
            position: relative;
            background: linear-gradient(135deg, var(--black-dark), var(--black-medium));
            padding: 1px;
            border-radius: 1rem;
        }
        
        .gradient-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 1rem;
            padding: 2px;
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary), var(--gold-dark));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }
        
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
            border-color: var(--gold-primary);
        }
        
        .gold-gradient {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .gold-shimmer {
            background: linear-gradient(90deg, var(--black-medium), var(--gold-primary), var(--black-medium));
            background-size: 200px 100%;
            animation: shimmer 3s infinite linear;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--black-dark);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--gold-primary);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold-secondary);
        }
        
        /* Password strength indicator */
        .password-strength {
            height: 4px;
            border-radius: 2px;
            margin-top: 4px;
            transition: all 0.3s ease;
        }
        
        .strength-weak {
            width: 25%;
            background: #EF4444;
        }
        
        .strength-medium {
            width: 50%;
            background: #F59E0B;
        }
        
        .strength-strong {
            width: 75%;
            background: #10B981;
        }
        
        .strength-very-strong {
            width: 100%;
            background: var(--gold-primary);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-6 py-8" style="background: var(--black-dark);">
    <!-- Background decorative elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-20 h-20 rounded-full blur-xl animate-float" style="background: rgba(212, 175, 55, 0.1);"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 rounded-full blur-xl animate-float" style="background: rgba(212, 175, 55, 0.1); animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 rounded-full blur-xl animate-float" style="background: rgba(212, 175, 55, 0.1); animation-delay: 2s;"></div>
        
        <!-- Gold accents -->
        <div class="absolute top-1/4 right-1/4 w-2 h-2 rounded-full" style="background: var(--gold-primary); box-shadow: 0 0 10px 2px var(--gold-primary);"></div>
        <div class="absolute bottom-1/3 left-1/3 w-1 h-1 rounded-full" style="background: var(--gold-primary); box-shadow: 0 0 8px 1px var(--gold-primary);"></div>
    </div>

    <div class="w-full max-w-5xl gradient-border shadow-2xl overflow-hidden flex flex-col lg:flex-row animate-fadeInUp">
        {{-- LEFT SIDE — Branding --}}
        <div class="w-full lg:w-1/2 p-10 flex flex-col justify-center" style="background: var(--black-medium); border-right: 1px solid rgba(212, 175, 55, 0.2); position: relative; overflow: hidden;">
            <!-- Background pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23D4AF37' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
            
            <!-- Gold decorative line -->
            <div class="absolute top-0 left-0 right-0 h-1 gold-shimmer"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));">
                        <i class="fas fa-crown text-white text-lg"></i>
                    </div>
                    <h1 class="text-4xl font-extrabold tracking-wide gold-gradient">
                        Sigma Studio
                    </h1>
                </div>

                <p class="mt-4 text-lg leading-relaxed max-w-md" style="color: var(--text-light);">
                    Daftar sekarang dan mulai nikmati pengalaman booking barbershop yang lebih modern dan premium.
                </p>

                <div class="mt-10">
                    <div class="relative rounded-xl overflow-hidden shadow-lg" style="border: 1px solid rgba(212, 175, 55, 0.3);">
                        <img src="https://images.unsplash.com/photo-1599351431202-1e0f0137899a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                             class="w-full h-64 object-cover"
                             alt="Sigma Studio Barbershop">
                        <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(10, 10, 10, 0.9), transparent);"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="font-semibold">Bergabunglah Dengan Kami</p>
                            <p class="text-sm" style="color: var(--gold-light);">Premium Barbershop Experience</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4" style="color: var(--text-muted);">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle" style="color: var(--gold-primary);"></i>
                        <span class="text-sm">Booking Online 24/7</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle" style="color: var(--gold-primary);"></i>
                        <span class="text-sm">Professional Barbers</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle" style="color: var(--gold-primary);"></i>
                        <span class="text-sm">Premium Products</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle" style="color: var(--gold-primary);"></i>
                        <span class="text-sm">Loyalty Rewards</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT SIDE — Register Form --}}
        <div class="w-full lg:w-1/2 p-10" style="background: var(--black-medium);">
            <div class="max-w-md mx-auto">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold mb-2" style="color: var(--text-light);">
                        Buat Akun Baru
                    </h2>
                    <p style="color: var(--text-muted);">Bergabung dengan komunitas premium kami</p>
                </div>

                {{-- Session Status --}}
                @if (session('status'))
                    <div class="mb-4 p-3 rounded-lg text-sm flex items-center" style="background: rgba(212, 175, 55, 0.1); border: 1px solid rgba(212, 175, 55, 0.3); color: var(--gold-light);">
                        <i class="fas fa-check-circle mr-2" style="color: var(--gold-primary);"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-6" id="register-form">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm mb-2" style="color: var(--text-light);">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user" style="color: var(--gold-primary);"></i>
                            </div>
                            <input 
                                type="text" 
                                name="name"
                                required
                                class="w-full pl-10 pr-4 py-3 rounded-lg placeholder-zinc-500 input-focus transition duration-200"
                                style="background: var(--black-light); border: 1px solid rgba(212, 175, 55, 0.3); color: var(--text-light);"
                                placeholder="Nama lengkap kamu"
                                id="name-input"
                            >
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm mb-2" style="color: var(--text-light);">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope" style="color: var(--gold-primary);"></i>
                            </div>
                            <input 
                                type="email" 
                                name="email"
                                required
                                class="w-full pl-10 pr-4 py-3 rounded-lg placeholder-zinc-500 input-focus transition duration-200"
                                style="background: var(--black-light); border: 1px solid rgba(212, 175, 55, 0.3); color: var(--text-light);"
                                placeholder="email@example.com"
                                id="email-input"
                            >
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm mb-2" style="color: var(--text-light);">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock" style="color: var(--gold-primary);"></i>
                            </div>
                            <input 
                                type="password"
                                name="password"
                                required
                                class="w-full pl-10 pr-10 py-3 rounded-lg placeholder-zinc-500 input-focus transition duration-200"
                                style="background: var(--black-light); border: 1px solid rgba(212, 175, 55, 0.3); color: var(--text-light);"
                                placeholder="••••••••"
                                id="password-input"
                            >
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" style="color: var(--gold-primary);" id="toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-strength" id="password-strength"></div>
                        <p class="text-xs mt-1" style="color: var(--text-muted);" id="password-hint">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</p>
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label class="block text-sm mb-2" style="color: var(--text-light);">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock" style="color: var(--gold-primary);"></i>
                            </div>
                            <input 
                                type="password"
                                name="password_confirmation"
                                required
                                class="w-full pl-10 pr-4 py-3 rounded-lg placeholder-zinc-500 input-focus transition duration-200"
                                style="background: var(--black-light); border: 1px solid rgba(212, 175, 55, 0.3); color: var(--text-light);"
                                placeholder="••••••••"
                                id="confirm-password-input"
                            >
                        </div>
                        <p class="text-xs mt-1" style="color: var(--text-muted);" id="confirm-hint">Masukkan kembali password yang sama</p>
                    </div>

                    {{-- Terms and Conditions --}}
                    <div class="flex items-start gap-2 text-sm">
                        <div class="relative mt-1">
                            <input type="checkbox" name="terms" class="sr-only" id="terms-checkbox" required>
                            <div class="w-5 h-5 rounded flex items-center justify-center transition duration-200 cursor-pointer" style="background: var(--black-light); border: 1px solid rgba(212, 175, 55, 0.3);" id="terms-checkbox-visual">
                                <i class="fas fa-check text-xs" style="color: var(--gold-primary); opacity: 0;" id="terms-check"></i>
                            </div>
                        </div>
                        <label class="cursor-pointer" style="color: var(--text-light);" for="terms-checkbox">
                            Saya menyetujui <a href="#" class="font-medium" style="color: var(--gold-primary);">Syarat & Ketentuan</a> dan <a href="#" class="font-medium" style="color: var(--gold-primary);">Kebijakan Privasi</a>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" 
                        class="w-full py-3.5 text-white font-semibold rounded-lg transition duration-200 shadow-lg flex items-center justify-center gap-2 group relative overflow-hidden"
                        style="background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));"
                        id="submit-button">
                        <span class="relative z-10">Daftar Sekarang</span>
                        <i class="fas fa-user-plus group-hover:translate-x-1 transition-transform duration-200 relative z-10"></i>
                        <div class="absolute inset-0 gold-shimmer opacity-30"></div>
                    </button>
                </form>

                <p class="text-center mt-8 text-sm" style="color: var(--text-muted);">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" 
                       class="font-semibold transition duration-200 ml-1" style="color: var(--gold-primary);">
                        Masuk sekarang
                    </a>
                </p>
                
                <div class="mt-8 pt-6" style="border-top: 1px solid rgba(212, 175, 55, 0.2);">
                    <p class="text-center text-xs" style="color: var(--text-muted);">
                        &copy; 2023 Sigma Studio. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password-input');
            
            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            }
            
            // Terms checkbox behavior
            const termsCheckbox = document.getElementById('terms-checkbox');
            const termsCheck = document.getElementById('terms-check');
            const termsCheckboxVisual = document.getElementById('terms-checkbox-visual');
            
            if (termsCheckbox && termsCheck) {
                termsCheckboxVisual.addEventListener('click', function() {
                    termsCheckbox.checked = !termsCheckbox.checked;
                    if (termsCheckbox.checked) {
                        termsCheck.classList.remove('opacity-0');
                    } else {
                        termsCheck.classList.add('opacity-0');
                    }
                });
            }
            
            // Password strength indicator
            const passwordField = document.getElementById('password-input');
            const strengthBar = document.getElementById('password-strength');
            const passwordHint = document.getElementById('password-hint');
            
            if (passwordField && strengthBar) {
                passwordField.addEventListener('input', function() {
                    const password = this.value;
                    let strength = 0;
                    
                    if (password.length >= 8) strength += 1;
                    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
                    if (password.match(/\d/)) strength += 1;
                    if (password.match(/[^a-zA-Z\d]/)) strength += 1;
                    
                    // Reset classes
                    strengthBar.className = 'password-strength';
                    passwordHint.style.color = 'var(--text-muted)';
                    
                    if (password.length === 0) {
                        strengthBar.style.width = '0%';
                        passwordHint.textContent = 'Gunakan minimal 8 karakter dengan kombinasi huruf dan angka';
                    } else if (strength <= 1) {
                        strengthBar.classList.add('strength-weak');
                        passwordHint.textContent = 'Password lemah - tambahkan huruf besar, angka, atau simbol';
                        passwordHint.style.color = '#EF4444';
                    } else if (strength === 2) {
                        strengthBar.classList.add('strength-medium');
                        passwordHint.textContent = 'Password cukup - bisa lebih kuat dengan karakter khusus';
                        passwordHint.style.color = '#F59E0B';
                    } else if (strength === 3) {
                        strengthBar.classList.add('strength-strong');
                        passwordHint.textContent = 'Password kuat - hampir sempurna!';
                        passwordHint.style.color = '#10B981';
                    } else {
                        strengthBar.classList.add('strength-very-strong');
                        passwordHint.textContent = 'Password sangat kuat - excellent!';
                        passwordHint.style.color = 'var(--gold-primary)';
                    }
                });
            }
            
            // Password confirmation check
            const confirmPasswordField = document.getElementById('confirm-password-input');
            const confirmHint = document.getElementById('confirm-hint');
            
            if (confirmPasswordField && passwordField) {
                confirmPasswordField.addEventListener('input', function() {
                    if (this.value !== passwordField.value) {
                        this.style.borderColor = '#EF4444';
                        confirmHint.textContent = 'Password tidak cocok';
                        confirmHint.style.color = '#EF4444';
                    } else {
                        this.style.borderColor = 'var(--gold-primary)';
                        confirmHint.textContent = 'Password cocok';
                        confirmHint.style.color = 'var(--gold-primary)';
                    }
                });
            }
            
            // Form validation before submit
            const form = document.getElementById('register-form');
            const submitButton = document.getElementById('submit-button');
            
            if (form) {
                form.addEventListener('submit', function(e) {
                    if (!termsCheckbox.checked) {
                        e.preventDefault();
                        termsCheckboxVisual.style.borderColor = '#EF4444';
                        alert('Anda harus menyetujui Syarat & Ketentuan untuk melanjutkan.');
                    }
                });
            }
        });
    </script>
</body>
</html>