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
            margin-top: 40px;
        }
        .signature {
            text-align: right;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h3 class="mb-0">Laporan</h3>
            <p class="mb-0">Laporan</p>
            <h2 class="mb-3"><strong>LAPORAN</strong></h2>
        </div>
        <div class="table-container">
            <table class="table table-bordered" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tahapan Panen</th>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">Hasil Panen</th>
                        <th class="text-center">Modal</th>
                        <th class="text-center">Laba</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nan as $item) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tahapan_panen }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->waktu)->format('d F Y') }}</td>
                        <td>Rp. {{ $item->hasil_panen }}</td>
                        <td>Rp. {{ $item->modal }}</td>
                        <td>Rp. {{ $item->laba }}</td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td>Rp. {{ number_format($totalPanen, 2, ',', '.') }}</td>
                        <td>Rp. {{ number_format($totalModal, 2, ',', '.') }}</td>
                        <td>Rp. {{ number_format($totalLaba, 2, ',', '.') }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="signature">
            <p>Tanda Tangan: ______________</p>
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
