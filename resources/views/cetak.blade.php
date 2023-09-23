<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .address {
            text-align: center;
        }
        .table-container {
            margin-top: 50px;
        }
        .signature {
            text-align: right;
            margin-top: 100px;
        }
        .total-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h3 class="mb-0">Laporan Data Rumah Jangkrik</h3>
            <p class="mb-0">Laporan </p>
            <h2 class="mb-3"><strong>LAPORAN Data Rumah Jangkrik </strong></h2>
            <p>==================================================================</p>
        </div>
        <div class="table-container">
            <table class="table table-bordered" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Telur</th>
                        <th class="text-center">Panen</th>
                        <th class="text-center">Omset</th>
                        <th class="text-center">Pengeluaran</th>
                        <th class="text-center">Keuntungan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nan as $item) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                        <td>{{ $item->telur }}</td>
                        <td>{{ $item->panen }}</td>
                        <td>Rp. {{ $item->omset }}</td>
                        <td>Rp. {{ $item->pengeluaran }}</td>
                        <td>{{ $item->keuntungan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="total-container">
            <p>Total Telur: {{ $totalTelur }}</p>
            <p>Total Panen: {{ $totalPanen }}</p>
            <p>Total Omset: Rp. {{ number_format($totalOmset, 2, ',', '.') }}</p>
            <p>Total Pengeluaran: Rp. {{ number_format($totalPengeluaran, 2, ',', '.') }}</p>
            <p>Total Keuntungan: Rp. {{ number_format($totalKeuntungan, 2, ',', '.') }}</p>
        </div> --}}
        
    
        <div class="signature">
            <p>Tanda Tangan : __________________</p>
        </div>
    </div>
    <script>
        // Fungsi untuk menghapus tautan saat mencetak
        function removeLinksForPrinting() {
            var links = document.getElementsByTagName('a');
            for (var i = 0; i < links.length; i++) {
                links[i].classList.add('no-print');
            }
        }
    
        // Panggil fungsi saat halaman telah dimuat
        document.addEventListener('DOMContentLoaded', function() {
            removeLinksForPrinting();
            window.print(); // Cetak halaman setelah diatur
        });
    </script>
</body>
</html>
