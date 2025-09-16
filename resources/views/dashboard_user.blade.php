<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Kotabaru Tourism Data Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
        }

        /* Header full width */
        .header {
            background-color: #2f5233;
            color: white;
            padding: 1.5rem;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
        }

        /* Sidebar */
        .sidebar {
            background-color: #0d3059;
            color: white;
            min-height: 100vh;
            padding-top: 1rem;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #15477a;
        }

        /* Peta */
        .map-container {
            background-color: #eee;
            border: 2px solid #ccc;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
        }

        /* Ringkasan */
        .stat-box {
            border-radius: 10px;
            padding: 25px;
            background: #f8f9fa;
            text-align: center;
            border: 2px solid #ccc;
            font-weight: bold;
        }

        .stat-box h3 {
            font-size: 28px;
            margin: 0;
        }

        .stat-box p {
            margin: 0;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #555;
        }
    </style>
</head>

<body>

    <!-- Header di atas -->
    <div class="header">
        Kotabaru Tourism Data Center
    </div>

    <!-- Layout utama -->
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <a href="#" class="active"><i class="bi bi-house-door-fill me-2"></i> Dashboard</a>
            <a href="{{ route('wisata.create') }}"><i class="bi bi-building me-2"></i> Tempat Wisata</a>
            <a href="#"><i class="bi bi-egg-fried me-2"></i> Tempat Kuliner</a>
        </div>

        <!-- Content -->
        <div class="col-md-10">
            <div class="container mt-4">
                <!-- Peta -->
                <div class="map-container mb-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.118436039951!2d110.365!3d-7.787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57877e1b53d7%3A0x123456789abcdef!2sKotabaru%20Yogyakarta!5e0!3m2!1sid!2sid!4v1234567890"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <!-- Ringkasan -->
                <h5 class="mb-3">RINGKASAN DATA</h5>
                <div class="row text-center">
                    <div class="col-md-6 mb-3">
                        <div class="stat-box">
                            <h3>12</h3>
                            <p>Lokasi Wisata</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="stat-box">
                            <h3>30</h3>
                            <p>Lokasi Kuliner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
