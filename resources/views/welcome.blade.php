<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kotabaru Tourism Data Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .bg-header {
            background-color: #3A6147;
        }
        .navbar-brand {
            font-family: 'Inknut Antiqua', serif;
            font-size: 1.5rem;
        }
        .map-container {
            width: 100%;
            height: 500px;
            border: 2px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
        }
        .summary-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .summary-number {
            font-size: 2rem;
            font-weight: bold;
            color: #3A6147;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-header">
        <div class="container">
            <a class="navbar-brand fw-bold">Kotabaru Tourism Data Center</a>
            <a class="btn btn-outline-light" href="{{ route('login') }}">Login Admin</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container py-4">
        <!-- Map -->
        <div class="map-container mb-4">
            {{-- nanti disini isi peta interaktif --}}
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.118436039951!2d110.365!3d-7.787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57877e1b53d7%3A0x123456789abcdef!2sKotabaru%20Yogyakarta!5e0!3m2!1sid!2sid!4v1234567890"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <!-- Summary -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="summary-box">
                    <div class="summary-number">12</div>
                    <div class="text-muted">LOKASI WISATA</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="summary-box">
                    <div class="summary-number">12</div>
                    <div class="text-muted">LOKASI KULINER</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-muted mt-5 mb-3">
        &copy; {{ date('Y') }} Sistem Pendataan KP Leon 🌙
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
