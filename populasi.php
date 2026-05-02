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
    <title>Data Populasi Ayam - Sistem Informasi Peternakan Ayam</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .custom-panel {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            background: #fff;
            padding: 16px;
            margin-bottom: 20px;
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

        .sb-sidenav .nav-link.active-custom {
            background-color: rgba(255,255,255,0.12);
            border-radius: 6px;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .page-box {
            width: 38px;
            height: 38px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #212529;
            margin-left: 6px;
            background: #fff;
        }

        .page-box.active {
            background: #495057;
            color: #fff;
            border-color: #495057;
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
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link active-custom" href="populasi.php">
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
                    <h1 class="mt-4">Data Populasi Ayam</h1>
                    <p class="text-muted">Kelola data populasi ayam pada setiap kandang dan periode.</p>

                    <div class="custom-panel">
                        <div class="row g-3 mb-3">
                            <div class="col-md-2">
                                <a href="#" class="btn btn-primary w-100">
                                    <i class="fas fa-plus-circle me-2"></i>Tambah Data
                                </a>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Cari tanggal atau kandang...">
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>Pilih Kandang</option>
                                    <option>Kandang 1</option>
                                    <option>Kandang 2</option>
                                    <option>Kandang 3</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kandang</th>
                                        <th>Periode</th>
                                        <th>Jumlah Populasi (Ekor)</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>12/12/2025</td>
                                        <td>Kandang 1</td>
                                        <td>2025/01</td>
                                        <td>1.000</td>
                                        <td>DOC masuk</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>12/12/2025</td>
                                        <td>Kandang 2</td>
                                        <td>2025/01</td>
                                        <td>1.000</td>
                                        <td>DOC masuk</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>12/12/2025</td>
                                        <td>Kandang 3</td>
                                        <td>2025/01</td>
                                        <td>1.000</td>
                                        <td>DOC masuk</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>28/12/2025</td>
                                        <td>Kandang 1</td>
                                        <td>2025/01</td>
                                        <td>980</td>
                                        <td>Setelah seleksi</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>28/12/2025</td>
                                        <td>Kandang 2</td>
                                        <td>2025/01</td>
                                        <td>975</td>
                                        <td>Setelah seleksi</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="text-muted">Menampilkan 1 - 5 dari 25 data</div>
                            <div>
                                <a href="#" class="page-box"><i class="fas fa-angle-left"></i></a>
                                <a href="#" class="page-box active">1</a>
                                <a href="#" class="page-box">2</a>
                                <a href="#" class="page-box">3</a>
                                <span class="ms-2 me-2">...</span>
                                <a href="#" class="page-box">5</a>
                                <a href="#" class="page-box"><i class="fas fa-angle-right"></i></a>
                            </div>
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