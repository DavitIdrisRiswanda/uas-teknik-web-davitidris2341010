<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background: #f8fbff; overflow-x: hidden; overflow-y: hidden; height: 100vh; }
        html { scroll-behavior: smooth; height: 100%; }

        /* HERO SECTION */
        .hero { height: 100vh; display: flex; align-items: center; justify-content: center; position: relative; padding-top: 30px; padding-bottom: 30px; }
        .hero::before { content: ""; position: absolute; width: 600px; height: 600px; border-radius: 50%; background: #bfdbfe; top: -250px; right: -200px; filter: blur(50px); z-index: -1; }
        .hero::after { content: ""; position: absolute; width: 500px; height: 500px; border-radius: 50%; background: #dbeafe; bottom: -200px; left: -150px; filter: blur(60px); z-index: -1; }
        
        .hero h1 { font-size: 64px; font-weight: 800; color: #0f172a; line-height: 1.2; }
        .hero h1 span { color: #2563eb; }
        .hero p { margin-top: 20px; color: #64748b; font-size: 20px; line-height: 1.8; max-width: 820px; margin-left: auto; margin-right: auto; }
        
        /* BUTTONS */
        .btn-primary-custom { background: #2563eb; color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-block; transition: .3s; }
        .btn-primary-custom:hover { transform: translateY(-4px); background: #1d4ed8; color: white; }
        .btn-outline-custom { border: 2px solid #2563eb; color: #2563eb; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: .3s; }
        .btn-outline-custom:hover { background: #2563eb; color: white; }

        .badge { font-size: 14px; font-weight: 500; letter-spacing: .5px; }

        /* FEATURE CARDS */
        .feature-card { background: white; border-radius: 24px; padding: 35px; text-align: center; transition: .35s; box-shadow: 0 15px 35px rgba(0,0,0,.06); height: 100%; }
        .feature-card:hover { transform: translateY(-10px); box-shadow: 0 25px 50px rgba(37,99,235,.15); }
        .feature-icon { width: 80px; height: 80px; border-radius: 50%; margin: auto; background: #eff6ff; display: flex; align-items: center; justify-content: center; font-size: 35px; color: #2563eb; margin-bottom: 25px; }
        .feature-card p { color: #64748b; margin-top: 10px; }

        /* CATEGORY CARDS */
        .category-card { background: #f8fbff; border-radius: 22px; padding: 40px; text-align: center; transition: .35s; cursor: pointer; border: 2px solid transparent; }
        .category-card:hover { border-color: #2563eb; transform: translateY(-8px); }
        .category-card i { font-size: 48px; color: #2563eb; margin-bottom: 20px; display: block; }
        .category-card h5 { margin: 0; font-weight: 600; }

        /* FOOTER */
        .footer { background: #0f172a; padding: 70px 0 30px; margin-top: 100px; }

        .fade-in-up { opacity: 0; transform: translateY(25px); animation: fadeInUp 0.85s ease-out forwards; }
        .fade-in-up.delay-1 { animation-delay: 0.1s; }
        .fade-in-up.delay-2 { animation-delay: 0.25s; }
        .fade-in-up.delay-3 { animation-delay: 0.4s; }
        .fade-in-up.delay-4 { animation-delay: 0.55s; }
        .fade-in-up.delay-5 { animation-delay: 0.7s; }

        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        
        @media(max-width: 992px) {
            .hero { padding-top: 120px; text-align: center; }
            .hero h1 { font-size: 38px; }
        }
    </style>
</head>
<body>

    <section class="hero text-center">
        <div class="container fade-in-up delay-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <span class="badge rounded-pill bg-primary px-5 py-3 mb-4 d-inline-block fs-5">
                         Cash Or Duel
                    </span>
                    
                    <h1>Temukan Produk <span>Terbaik</span> Dengan Pengalaman Belanja Yang Menantang</h1>
                    
                    <p>Every Choice Matters
                        <br>Temukan berbagai produk berkualitas dari penjual terpercaya dalam satu platform yang dirancang untuk memberikan pengalaman belanja yang cepat, aman, nyaman, dan penuh kemudahan.
                    </p>
                    
                    <div class="mt-5 d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('login') }}" class="btn-outline-custom">Masuk Sekarang</a>
                        <a href="{{ route('register.choice') }}" class="btn-outline-custom">Mulai Berjualan</a>
                    </div>
                    
                    <div class="row mt-5 pt-3 g-4 justify-content-center">
                        <div class="col-md-3 col-sm-4">
                            <h2 class="fw-bold text-primary">500+</h2>
                            <p class="text-secondary fw-medium mb-0">Produk</p>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <h2 class="fw-bold text-primary">120+</h2>
                            <p class="text-secondary fw-medium mb-0">Seller</p>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <h2 class="fw-bold text-primary">1K+</h2>
                            <p class="text-secondary fw-medium mb-0">Transaksi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>