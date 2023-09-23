@extends('layouts.template')
@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h3>Masukkan Data Rm Jangkrik</h3>
        <div class="container-fluid">
        <form action="{{ route('rm_jangkrik.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" required>
            </div>
            <div class="form-group">
                <label for="telur">Telur</label>
                <input type="number" id="telur" name="telur" class="form-control" placeholder="Telur" required>
            </div>
            <div class="form-group">
                <label for="panen">Panen</label>
                <input type="text" id="panen" name="panen" class="form-control" placeholder="Panen" required>
            </div>
    
            <div class="form-group">
                <label for="omset">Omset</label>
                <input type="text" id="omset" name="omset" class="form-control"
                 placeholder="Omset" oninput="calculateProfit()">
            </div>
            
            <div class="form-group">
                <label for="pengeluaran">Pengeluaran</label>
                <input type="text" id="pengeluaran" name="pengeluaran" class="form-control"
                placeholder="Pengeluaran" oninput="calculateProfit()">
            </div>
            
            <div class="form-group">
                <label for="keuntungan">Keuntungan</label>
                <input type="text" id="keuntungan" name="keuntungan" class="form-control"
                placeholder="Keuntungan" readonly>
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

    @include('layouts.footer')
    @include('sweetalert::alert')

@endsection
