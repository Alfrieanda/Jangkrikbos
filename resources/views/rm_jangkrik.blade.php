    @extends('layouts.template')
    @section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data RM Jangkrik</h1>
            <div class="d-flex">
                <a href="{{ route('cetak.index') }}" class="btn btn-sm btn-success shadow-sm mr-2">
                    <i class="fa fa-file fa-sm text-white-100"></i> Cetak Pdf
                </a>
                <span class="d-none d-sm-inline-block text-white-50">|</span>
                <a href="{{ route('tambah_rm_jangkrik') }}" class="btn btn-sm btn-primary shadow-sm ml-2">
                    <i class="fa fa-plus fa-sm text-white-100"></i> Tambah Data
                </a>
            </div>
        </div>

        <hr/>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Telur</th>
                    <th class="text-center">Panen</th>
                    <th class="text-center">Omset</th>
                    <th class="text-center">Pengeluaran</th>
                    <th class="text-center">Keuntungan</th>
                    <th class="text-center">Aksi</th>
                </tr>
                @php
                $totalTelur = 0;
                $totalPanen = 0;
                $totalOmset = 0;
                $totalPengeluaran = 0;
                $totalKeuntungan = 0; //ini udah
                @endphp
                @foreach ($nan as $item) 
                <tr>
                    <td class="text-right">{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                    <td>{{ $item->telur }}</td>
                    <td>{{ $item->panen }}</td>
                    <td>Rp {{ $item->omset }}</td>
                    <td>Rp {{ $item->pengeluaran }}</td>
                    <td>{{ $item->keuntungan }}</td>
                    
                    <td>
                        <a href="{{ route('rm_jangkrik.edit', $item->id) }}" method="GET" class="btn btn-primary btn-sm" style="text-decoration: none;">
                            @csrf
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </a> |
                        
                        <form action="{{ route('rm_jangkrik.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                
                @php
                    // Mengonversi nilai omset, pengeluaran, dan keuntungan ke tipe data numerik
                    $omsetNumeric = floatval(str_replace(['Rp. ', '.'], '', $item->omset));
                    $pengeluaranNumeric = floatval(str_replace(['Rp. ', '.'], '', $item->pengeluaran));
                    // $keuntunganNumeric = floatval(str_replace(['Rp. ', '.'], '', $item->keuntungan));
                
                    // Menambahkan nilai numerik ke total
                    $totalTelur += is_numeric($item->telur) ? $item->telur : 0;
                    $totalPanen += is_numeric($item->panen) ? $item->panen : 0;
                    $totalOmset += $omsetNumeric;
                    $totalPengeluaran += $pengeluaranNumeric;
                    // $totalKeuntungan += floatval(str_replace(['Rp ', '.'], '', $item->laba));
                @endphp
                @endforeach
                
                <tr>
                    <td colspan="2" class="text-center"><strong>Total</strong></td>
                    <td><strong>{{ $totalTelur }}</strong></td>
                    <td><strong>{{ $totalPanen }}</strong></td>
                    <td><strong>Rp. {{ number_format($totalOmset, 2, ',', '.') }}</strong></td>
                    <td><strong>Rp. {{ number_format($totalPengeluaran, 2, ',', '.') }}</strong></td>
                    <td><strong><span id="total-keuntungan">Rp. 0,00</span></strong></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        // Function to calculate and update total keuntungan
        function updateTotalKeuntungan() {
            let totalKeuntungan = 0;
    
            // Loop through each row in the table
            document.querySelectorAll('table tr').forEach(function(row, index) {
                if (index > 0) { // Skip the header row
                    // Get the keuntungan cell in the row (assuming it's in the 7th column)
                    const keuntunganCell = row.cells[6];
                    if (keuntunganCell) {
                        // Extract the numeric value from the cell's text content
                        const keuntunganValue = parseFloat(keuntunganCell.textContent.replace(/[^0-9,-]+/g,"").replace(/,/g, '.').replace(/-/g, '')) || 0;
                        // Add the keuntungan value to the total
                        totalKeuntungan += keuntunganValue;
                    }
                }
            });
    
            // Update the total keuntungan element
            const totalKeuntunganElement = document.getElementById('total-keuntungan');
            totalKeuntunganElement.textContent = 'Rp. ' + totalKeuntungan.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    
        // Call the updateTotalKeuntungan function when the page loads
        window.addEventListener('DOMContentLoaded', function() {
            updateTotalKeuntungan();
        });
    </script>
    
    @endsection