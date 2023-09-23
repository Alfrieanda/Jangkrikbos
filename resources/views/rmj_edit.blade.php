<!DOCTYPE html>
<html lang="en">

<head>

    <title>Website Jangkrik</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                        <img class="img-profile rounded-circle"
                                    src="template/img/infooo.png">
                        </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">                               
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h3>Masukkan Data Rm Jangkrik</h3>
        <div class="container-fluid">
        <form action="{{ route('rm_jangkrik.update',$nan->id) }}" method="post">
            @csrf
            @method('PUT')  
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" 
                value="{{ $nan->tanggal }}" placeholder="Tanggal" required>
            </div>
            <div class="form-group">
                <label for="telur">Telur</label>
                <input type="number" id="telur" name="telur" class="form-control" 
                value="{{ $nan->telur }}" placeholder="Telur" required>
            </div>
            <div class="form-group">
                <label for="panen">Panen</label>
                <input type="text" id="panen" name="panen" class="form-control" 
                value="{{ $nan->panen }}" placeholder="Panen" required>
            </div>
    
            <div class="form-group">
                <label for="omset">Omset</label>
                <input type="text" id="omset" name="omset" class="form-control"
                 value="{{ $nan->omset }}" placeholder="Omset" oninput="calculateProfit()">
            </div>
            
            <div class="form-group">
                <label for="pengeluaran">Pengeluaran</label>
                <input type="text" id="pengeluaran" name="pengeluaran" class="form-control"
                value="{{ $nan->pengeluaran }}" placeholder="Pengeluaran" oninput="calculateProfit()">
            </div>
            
            <div class="form-group">
                <label for="keuntungan">Keuntungan</label>
                <input type="text" id="keuntungan" name="keuntungan" class="form-control"
                value="{{ $nan->keuntungan }}" placeholder="Keuntungan" readonly>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Simpan Data</button>
            </div>
        </form>
    </div>
    
    <script>
        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        }
    
        function calculateProfit() {
            var omsetInput = document.getElementById('omset').value.replace(/[^\d]/g, "");
            var pengeluaranInput = document.getElementById('pengeluaran').value.replace(/[^\d]/g, "");
            var keuntunganInput = document.getElementById('keuntungan');
    
            var omsetValue = parseFloat(omsetInput);
            var pengeluaranValue = parseFloat(pengeluaranInput);
            var keuntunganValue = omsetValue - pengeluaranValue;
    
            if (!isNaN(keuntunganValue)) {
                keuntunganInput.value = formatCurrency(keuntunganValue);
            }
        }
    </script>
    
    
                </div>
                
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin Ingin Logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>