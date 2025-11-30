<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigma Studio - Premium Barbershop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset dan variabel warna untuk dark mode */
        :root {
            --primary: #0f0f0f;
            --secondary: #b8942e;
            --accent: #a78b2a;
            --light: #1a1a1a;
            --white: #e5e5e5;
            --gray: #a3a3a3;
            --light-gray: #262626;
            --card-bg: #1e1e1e;
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            background-color: var(--primary);
            color: var(--white);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        section {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            width: 70px;
            height: 3px;
            background-color: var(--secondary);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: rgba(15, 15, 15, 0.95);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white);
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .logo-icon {
            color: var(--secondary);
            margin-right: 8px;
            font-size: 1.5rem;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 30px;
        }
        
        nav ul li a {
            text-decoration: none;
            color: var(--white);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }
        
        nav ul li a:hover {
            color: var(--secondary);
        }
        
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--secondary);
            bottom: -5px;
            left: 0;
            transition: var(--transition);
        }
        
        nav ul li a:hover::after {
            width: 100%;
        }
        
        .auth-buttons {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        
        .login-button {
            background-color: transparent;
            color: var(--white);
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            display: inline-block;
            border: 2px solid var(--secondary);
        }
        
        .login-button:hover {
            background-color: rgba(184, 148, 46, 0.1);
            color: var(--secondary);
        }
        
        .register-button {
            background-color: var(--secondary);
            color: var(--primary);
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            display: inline-block;
            border: 2px solid var(--secondary);
        }
        
        .register-button:hover {
            background-color: transparent;
            color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(184, 148, 46, 0.2);
        }
        
        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--white);
        }
        
        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(rgba(15, 15, 15, 0.85), rgba(15, 15, 15, 0.9)), url('https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80') no-repeat center center/cover;
        }
        
        .hero-content {
            max-width: 600px;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        
        .hero h1 span {
            color: var(--secondary);
            text-shadow: 0 0 10px rgba(184, 148, 46, 0.5);
        }
        
        .hero p {
            font-size: 1.1rem;
            color: var(--gray);
            margin-bottom: 30px;
        }
        
        .hero-buttons {
            display: flex;
            gap: 15px;
        }
        
        .cta-button {
            background-color: var(--secondary);
            color: var(--primary);
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            display: inline-block;
            border: 2px solid var(--secondary);
        }
        
        .cta-button:hover {
            background-color: transparent;
            color: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(184, 148, 46, 0.2);
        }
        
        .secondary-button {
            background-color: transparent;
            color: var(--white);
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            display: inline-block;
            border: 2px solid var(--white);
        }
        
        .secondary-button:hover {
            background-color: var(--white);
            color: var(--primary);
            transform: translateY(-3px);
        }
        
        /* Services Section */
        .services {
            background-color: var(--light);
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .service-card {
            background-color: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: var(--transition);
            border: 1px solid #333;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(184, 148, 46, 0.2);
            border-color: var(--secondary);
        }
        
        .service-image {
            height: 200px;
            overflow: hidden;
        }
        
        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
            filter: brightness(0.8);
        }
        
        .service-card:hover .service-image img {
            transform: scale(1.1);
            filter: brightness(1);
        }
        
        .service-content {
            padding: 25px;
        }
        
        .service-content h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }
        
        .service-content p {
            color: var(--gray);
            margin-bottom: 15px;
        }
        
        .service-price {
            font-weight: 700;
            color: var(--secondary);
            font-size: 1.2rem;
        }
        
        /* About Section */
        .about-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }
        
        .about-image {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            filter: brightness(0.8);
        }
        
        .about-content h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }
        
        .about-content p {
            margin-bottom: 20px;
            color: var(--gray);
        }
        
        .about-features {
            margin-top: 30px;
        }
        
        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .feature i {
            color: var(--secondary);
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        /* Gallery Section */
        .gallery {
            background-color: var(--light);
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }
        
        .gallery-item {
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            height: 250px;
            border: 1px solid #333;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
            filter: brightness(0.7);
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
            filter: brightness(1);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(184, 148, 46, 0.3));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .gallery-overlay i {
            color: var(--white);
            font-size: 2rem;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        
        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .team-member {
            text-align: center;
        }
        
        .member-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 5px solid var(--light-gray);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .member-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.9);
        }
        
        .team-member h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }
        
        .team-member p {
            color: var(--gray);
            margin-bottom: 15px;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: var(--light-gray);
            color: var(--white);
            transition: var(--transition);
        }
        
        .social-links a:hover {
            background-color: var(--secondary);
            color: var(--primary);
            transform: translateY(-3px);
        }
        
        /* Testimonials Section */
        .testimonials {
            background-color: var(--light);
        }
        
        .testimonial-slider {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }
        
        .testimonial {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 1px solid #333;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: var(--gray);
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .author-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
            border: 2px solid var(--secondary);
        }
        
        .author-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .author-info h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }
        
        .author-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        /* Contact Section */
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
        }
        
        .contact-icon {
            width: 50px;
            height: 50px;
            background-color: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--secondary);
            font-size: 1.2rem;
        }
        
        .contact-details h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }
        
        .contact-details p {
            color: var(--gray);
        }
        
        .contact-form {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: 10px;
            border: 1px solid #333;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #444;
            border-radius: 5px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--light-gray);
            color: var(--white);
        }
        
        .form-control:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(184, 148, 46, 0.2);
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        /* Footer */
        footer {
            background-color: #0a0a0a;
            color: var(--white);
            padding: 60px 0 20px;
        }
        
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-col h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-col h3::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 2px;
            background-color: var(--secondary);
            bottom: 0;
            left: 0;
        }
        
        .footer-col p {
            color: #a3a3a3;
            margin-bottom: 20px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #a3a3a3;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }
        
        .social-footer {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-footer a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            transition: var(--transition);
        }
        
        .social-footer a:hover {
            background-color: var(--secondary);
            transform: translateY(-5px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #a3a3a3;
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .about-container,
            .contact-container {
                grid-template-columns: 1fr;
            }
            
            .about-image {
                order: -1;
            }
        }
        
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }
            
            nav {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 70px);
                background-color: var(--card-bg);
                flex-direction: column;
                padding: 20px;
                transition: var(--transition);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
                border-right: 1px solid #333;
            }
            
            nav.active {
                left: 0;
            }
            
            nav ul {
                flex-direction: column;
            }
            
            nav ul li {
                margin: 15px 0;
            }
            
            .auth-buttons {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .cta-button, .secondary-button {
                width: 100%;
                text-align: center;
            }
        }
        
        @media (max-width: 576px) {
            .section-title h2 {
                font-size: 2rem;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-cut logo-icon"></i>
                Sigma Studio
            </a>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
            <nav>
                <ul>
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#gallery">Galeri</a></li>
                    <li><a href="#team">Tim</a></li>
                    <!-- <li><a href="#contact">Kontak</a></li> -->
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="login-button">Login</a>
                <a href="{{ route('register') }}" class="register-button">Register</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1>Seni Gaya Rambut <span>Premium</span> Dalam Nuansa Gelap</h1>
                <p>Sigma Studio menghadirkan pengalaman grooming kelas premium dengan teknik terkini dan layanan profesional untuk penampilan terbaik Anda dalam suasana yang elegan.</p>
                <div class="hero-buttons">
                    <a href="#services" class="cta-button">Lihat Layanan</a>
                    <a href="#contact" class="secondary-button">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Layanan Kami</h2>
                <p>Kami menawarkan berbagai layanan grooming terbaik dengan kualitas premium dan harga terjangkau.</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-image">
                        <img src="https://i.pinimg.com/736x/19/21/3b/19213b6091246d62a136773854be45e0.jpg" alt="Haircut">
                    </div>
                    <div class="service-content">
                        <h3>Hair Cut Premium</h3>
                        <p>Potong rambut dengan teknik terkini sesuai gaya yang Anda inginkan.</p>
                        <div class="service-price">Rp 75.000</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">
                        <img src="https://fajar.co.id/wp-content/uploads/2023/03/ilustrasi-cukur-jenggot.jpeg" alt="Beard Trim">
                    </div>
                    <div class="service-content">
                        <h3>Beard Grooming</h3>
                        <p>Perawatan jenggot lengkap dengan trim, shaping, dan conditioning.</p>
                        <div class="service-price">Rp 50.000</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">
                        <img src="https://9f8e62d4.delivery.rocketcdn.me/wp-content/uploads/2023/09/dyeing-your-hair.jpg" alt="Hair Coloring">
                    </div>
                    <div class="service-content">
                        <h3>Hair Coloring</h3>
                        <p>Pewarnaan rambut dengan produk berkualitas tinggi dan tahan lama.</p>
                        <div class="service-price">Rp 150.000</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-container">
                <div class="about-content">
                    <div class="section-title">
                        <h2>Tentang Sigma Studio</h2>
                    </div>
                    <p>Sigma Studio didirikan pada tahun 2018 dengan misi menghadirkan pengalaman grooming terbaik bagi para pria modern. Kami menggabungkan teknik tradisional dengan tren terkini untuk memberikan hasil yang memuaskan.</p>
                    <p>Dengan tim barber profesional yang berpengalaman, kami berkomitmen untuk memberikan pelayanan terbaik dan pengalaman yang tak terlupakan bagi setiap pelanggan.</p>
                    <div class="about-features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Teknik terkini dan alat modern</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Produk berkualitas premium</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Tim barber berpengalaman</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Konsultasi gaya gratis</span>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80" alt="About Sigma Studio">
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="section-title">
                <h2>Galeri Karya</h2>
                <p>Lihat hasil kerja terbaik kami yang telah membuat pelanggan puas dan percaya diri.</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1567894340315-735d7c361db0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Gallery 1">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1595877244574-e90ce41ce089?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Gallery 2">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1593705114312-a0ee03a3f7c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Gallery 3">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1621605815958-9155aba0b9b9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Gallery 4">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <div class="container">
            <div class="section-title">
                <h2>Tim Barber Profesional</h2>
                <p>Tim barber berpengalaman kami siap memberikan pelayanan terbaik untuk Anda.</p>
            </div>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Alex Johnson">
                    </div>
                    <h3>Alex Johnson</h3>
                    <p>Head Barber</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Michael Brown">
                    </div>
                    <h3>Michael Brown</h3>
                    <p>Senior Barber</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1507591064344-4c6ce005b128?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="David Wilson">
                    </div>
                    <h3>David Wilson</h3>
                    <p>Beard Specialist</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata Pelanggan</h2>
                <p>Testimoni dari pelanggan setia Sigma Studio.</p>
            </div>
            <div class="testimonial-slider">
                <div class="testimonial">
                    <p class="testimonial-text">"Pelayanan di Sigma Studio sangat memuaskan. Barber-nya profesional dan ramah. Hasil potongan rambut sesuai dengan yang saya inginkan. Pasti akan kembali lagi!"</p>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Rizky Pratama">
                        </div>
                        <div class="author-info">
                            <h4>Rizky Pratama</h4>
                            <p>Pelanggan Setia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <!-- <section class="contact" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Hubungi Kami</h2>
                <p>Jadwalkan kunjungan Anda atau tanyakan informasi lebih lanjut.</p>
            </div>
            <div class="contact-container">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Lokasi</h3>
                            <p>Jl. Kemang Raya No. 12, Jakarta Selatan</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Telepon</h3>
                            <p>+62 21 1234 5678</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Email</h3>
                            <p>info@sigmastudio.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Jam Operasional</h3>
                            <p>Senin - Minggu: 09.00 - 21.00 WIB</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="tel" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea id="message" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="cta-button">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <h3>Sigma Studio</h3>
                    <p>Barbershop premium dengan layanan terbaik untuk penampilan pria modern.</p>
                    <div class="social-footer">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Layanan</h3>
                    <ul class="footer-links">
                        <li><a href="#">Potong Rambut</a></li>
                        <li><a href="#">Perawatan Jenggot</a></li>
                        <li><a href="#">Pewarnaan Rambut</a></li>
                        <li><a href="#">Facial Treatment</a></li>
                        <li><a href="#">Paket Grooming</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Link Cepat</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#services">Layanan</a></li>
                        <li><a href="#about">Tentang</a></li>
                        <li><a href="#gallery">Galeri</a></li>
                        <li><a href="#team">Tim</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Kontak</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jakarta Selatan</a></li>
                        <li><a href="#"><i class="fas fa-phone-alt"></i> +62 21 1234 5678</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> info@sigmastudio.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Sigma Studio. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenu = document.querySelector('.mobile-menu');
        const nav = document.querySelector('nav');
        
        mobileMenu.addEventListener('click', () => {
            nav.classList.toggle('active');
        });
        
        // Close mobile menu when clicking on a link
        const navLinks = document.querySelectorAll('nav ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
            });
        });
        
        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.padding = '10px 0';
                header.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.3)';
            } else {
                header.style.padding = '20px 0';
                header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.3)';
            }
        });
    </script>
</body>
</html>