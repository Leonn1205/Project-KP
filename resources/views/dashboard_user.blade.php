<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Kotabaru Tourism Data Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        /* Header */
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
        #map {
            height: 500px;
            border-radius: 10px;
            border: 2px solid #ccc;
            margin-bottom: 20px;
        }

        /* Ringkasan */
        .stat-box {
            border-radius: 10px;
            padding: 25px;
            background: white;
            text-align: center;
            border: 1px solid #ddd;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .stat-box h3 {
            font-size: 28px;
            margin: 0;
            color: #2f5233;
        }

        .stat-box p {
            margin: 0;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #555;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        Kotabaru Tourism Data Center
    </div>

    <!-- Layout -->
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <a href="{{ route('dashboard') }}" class="active">
                <i class="bi bi-house-door-fill me-2"></i> Dashboard
            </a>
            <a href="{{ route('wisata.index') }}">
                <i class="bi bi-building me-2"></i> Tempat Wisata
            </a>
            <a href="#">
                <i class="bi bi-egg-fried me-2"></i> Tempat Kuliner
            </a>
        </div>

        <!-- Content -->
        <div class="col-md-10">
            <div class="container mt-4">
                <!-- Peta -->
                <div id="map"></div>

                <script>
                    var map = L.map('map').setView([-7.78694, 110.375], 15);

                    L.tileLayer('https://cartodb-basemaps-a.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
                        subdomains: 'abcd',
                        maxZoom: 20
                    }).addTo(map);

                    @foreach ($wisata as $w)
                        @if ($w->latitude && $w->longitude)
                            var marker = L.marker([{{ $w->latitude }}, {{ $w->longitude }}]).addTo(map);

                            marker.on('click', function() {
                                fetch("{{ route('wisata.show', $w->id_wisata) }}")
                                    .then(response => response.text())
                                    .then(html => {
                                        document.getElementById("wisataModalContent").innerHTML = html;
                                        var modal = new bootstrap.Modal(document.getElementById("wisataModal"));
                                        modal.show();
                                    });
                            });
                        @endif
                    @endforeach
                </script>

                <div class="modal fade" id="wisataModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">Detail Tempat Wisata</h5>
                                <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body" id="wisataModalContent">
                                <p class="text-muted">Memuat data...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan -->
                <h5 class="mb-3">Ringkasan Data</h5>
                <div class="row text-center">
                    <div class="col-md-6 mb-3">
                        <div class="stat-box">
                            <h3>{{ $wisata->count() }}</h3>
                            <p>Lokasi Wisata</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="stat-box">
                            <h3>0</h3>
                            <p>Lokasi Kuliner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
