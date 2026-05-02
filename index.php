<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$nama_admin = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard - Sistem Informasi Peternakan Ayam</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .dashboard-card {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            height: 100%;
        }

        .dashboard-card i {
            font-size: 42px;
            margin: 12px 0;
            color: #6c757d;
        }

        .dashboard-card h6 {
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .dashboard-card h2 {
            font-weight: 700;
            margin: 10px 0 0;
        }

        .dashboard-card p {
            margin-bottom: 0;
            color: #6c757d;
        }

        .custom-panel {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            background: #fff;
            padding: 16px;
            margin-bottom: 20px;
        }

        .chart-box {
            height: 260px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            position: relative;
            background: #fff;
        }

        .chart-line {
            position: absolute;
            left: 40px;
            right: 20px;
            bottom: 50px;
            top: 30px;
            border-left: 2px solid #999;
            border-bottom: 2px solid #999;
        }

        .chart-svg {
            position: absolute;
            left: 40px;
            top: 30px;
        }

        .activity-item {
            display: flex;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 42px;
            height: 42px;
            border-radius: 6px;
            background: #f1f3f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
        }

        .brand-logo-box {
            width: 42px;
            height: 42px;
            background: #e9ecef;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: #6c757d;
        }

        .top-user-box {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
        }

        .top-user-box .user-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #adb5bd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sb-sidenav .nav-link.active-custom {
            background-color: rgba(255,255,255,0.12);
            border-radius: 6px;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .logout-btn {
            color: #fff;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.4);
            padding: 6px 14px;
            border-radius: 6px;
            margin-left: 18px;
        }

        .logout-btn:hover {
            color: #fff;
            background: rgba(255,255,255,0.08);
        }

        .welcome-text {
            color: #6c757d;
            margin-top: -5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3 d-flex align-items-center" href="index.php">
            <div class="brand-logo-box">
                <i class="fas fa-warehouse"></i>
            </div>
            <span>Sistem Informasi Peternakan Ayam</span>
        </a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <div class="ms-auto me-3 d-flex align-items-center">
            <div class="top-user-box">
                <div class="user-circle">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <div style="font-weight:600;"><?php echo htmlspecialchars($nama_admin); ?></div>
                    <small>Admin</small>
                </div>
            </div>
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-right-from-bracket me-1"></i> Logout
            </a>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link active-custom" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="populasi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-drumstick-bite"></i></div>
                            Populasi Ayam
                        </a>
                        <a class="nav-link" href="pakan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Pakan
                        </a>
                        <a class="nav-link" href="kesehatan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-notes-medical"></i></div>
                            Kesehatan & Mortalitas
                        </a>
                        <a class="nav-link" href="panen.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-basket-shopping"></i></div>
                            Panen
                        </a>
                        <a class="nav-link" href="pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Pelanggan
                        </a>
                        <a class="nav-link" href="penjualan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-shopping"></i></div>
                            Penjualan
                        </a>
                        <a class="nav-link" href="pengguna.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-gear"></i></div>
                            Pengguna
                        </a>
                        <a class="nav-link" href="laporan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-lines"></i></div>
                            Laporan
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login sebagai:</div>
                    <?php echo htmlspecialchars($nama_admin); ?>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <p class="welcome-text">Selamat datang di Sistem Informasi Peternakan Ayam</p>

                    <div class="row g-3 mb-4">
                        <div class="col-xl col-md-6">
                            <div class="dashboard-card">
                                <h6>Populasi Ayam</h6>
                                <i class="fas fa-drumstick-bite"></i>
                                <h2>3.000</h2>
                                <p>Ekor</p>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="dashboard-card">
                                <h6>Pakan Hari Ini</h6>
                                <i class="fas fa-box-open"></i>
                                <h2>150</h2>
                                <p>Kg</p>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="dashboard-card">
                                <h6>Ayam Mati</h6>
                                <i class="fas fa-square-plus"></i>
                                <h2>12</h2>
                                <p>Ekor</p>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="dashboard-card">
                                <h6>Panen Terakhir</h6>
                                <i class="fas fa-basket-shopping"></i>
                                <h2>2.850</h2>
                                <p>Kg</p>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="dashboard-card">
                                <h6>Penjualan Bulan Ini</h6>
                                <i class="fas fa-cart-shopping"></i>
                                <h2 style="font-size: 28px;">Rp 45.000.000</h2>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                            <div class="custom-panel">
                                <h5 class="mb-3">Grafik Produksi</h5>
                                <div class="chart-box">
                                    <div class="chart-line"></div>
                                    <svg class="chart-svg" width="520" height="180" viewBox="0 0 520 180">
                                        <polyline
                                            fill="none"
                                            stroke="#6c757d"
                                            stroke-width="3"
                                            points="40,110 130,50 220,90 310,70 400,30" />
                                        <circle cx="40" cy="110" r="5" fill="#6c757d"/>
                                        <circle cx="130" cy="50" r="5" fill="#6c757d"/>
                                        <circle cx="220" cy="90" r="5" fill="#6c757d"/>
                                        <circle cx="310" cy="70" r="5" fill="#6c757d"/>
                                        <circle cx="400" cy="30" r="5" fill="#6c757d"/>
                                    </svg>
                                    <div style="position:absolute; bottom:10px; left:70px; display:flex; gap:38px; color:#6c757d;">
                                        <span>Jan</span>
                                        <span>Feb</span>
                                        <span>Mar</span>
                                        <span>Apr</span>
                                        <span>Mei</span>
                                        <span>Jun</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="custom-panel">
                                <h5 class="mb-3">Aktivitas Terbaru</h5>

                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fas fa-image"></i></div>
                                    <div>
                                        <div>Pencatatan pakan hari ini</div>
                                        <small class="text-muted">08:30 WIB</small>
                                    </div>
                                </div>

                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fas fa-image"></i></div>
                                    <div>
                                        <div>Tambah data populasi</div>
                                        <small class="text-muted">Kemarin, 14:20 WIB</small>
                                    </div>
                                </div>

                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fas fa-image"></i></div>
                                    <div>
                                        <div>Transaksi penjualan</div>
                                        <small class="text-muted">12/12/2025 10:15 WIB</small>
                                    </div>
                                </div>

                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fas fa-image"></i></div>
                                    <div>
                                        <div>Data kesehatan diperbarui</div>
                                        <small class="text-muted">11/12/2025 09:00 WIB</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="custom-panel">
                        <h5 class="mb-3">Data Terakhir</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width:70px;">No</th>
                                        <th style="width:160px;">Tanggal</th>
                                        <th style="width:160px;">Kegiatan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>12/12/2025</td>
                                        <td>Populasi</td>
                                        <td>Penambahan populasi 3.000 ekor</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>12/12/2025</td>
                                        <td>Pakan</td>
                                        <td>Pemberian pakan 150 kg</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>11/12/2025</td>
                                        <td>Kesehatan</td>
                                        <td>Ayam mati 12 ekor</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>10/12/2025</td>
                                        <td>Panen</td>
                                        <td>Panen 2.850 kg</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-end">
                            <a href="#" class="btn btn-outline-secondary">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Sistem Informasi Peternakan Ayam 2026</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>