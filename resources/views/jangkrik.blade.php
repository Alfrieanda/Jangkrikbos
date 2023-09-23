@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jangkrik</h1>
        <div class="d-flex">
            <form method="GET" action="#" class="form-inline">
            @csrf
              
            </form>
            <a href="{{ route('cetakjangkrik.index') }}" class="btn btn-sm btn-success shadow-sm mr-2">
                <i class="fa fa-file fa-sm text-white-100"></i> Cetak Pdf
            </a>
            <span class="d-none d-sm-inline-block text-white-50">|</span>
            <a href="{{ route('jangkrik.create') }}" class="btn btn-sm btn-primary shadow-sm ml-2">
                <i class="fa fa-plus fa-sm text-white-100"></i> Tambah Data
            </a>
            <span class="d-none d-sm-inline-block text-white-50">|</span>
            <form action="{{ route('jangkrik.index') }}" method="GET">
                @csrf <!-- Laravel CSRF token -->
                <label for="bulan">Bulan : </label>
                <input type="month" id="bulan" name="bulan">
                <input type="submit">
            </form>
        
        </div>
    </div>

    <hr />
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tahapan Panen</th>
                <th class="text-center">Waktu</th>
                <th class="text-center">Hasil Panen</th>
                <th class="text-center">Modal</th>
                <th class="text-center">Laba</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
            @php
            $totalPanen = 0; // Inisialisasi variabel total panen
            $totalModal = 0;
            $totalLaba = 0;
            @endphp
          
            @foreach ($nan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tahapan_panen }}</td>
                <td>{{ \Carbon\Carbon::parse($item->waktu)->format('d F Y') }}</td>
                <td>Rp. {{ number_format(floatval(str_replace(['Rp ', '.'], '', $item->hasil_panen)), 2, ',', '.') }}</td>
                <td>Rp. {{ number_format(floatval(str_replace(['Rp ', '.'], '', $item->modal)), 2, ',', '.') }}</td>
                <td>Rp. {{ number_format(floatval(str_replace(['Rp ', '.'], '', $item->laba)), 2, ',', '.') }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('jangkrik.edit', $item->id) }}" class="btn btn-primary btn-sm"
                        style="text-decoration: none;">
                        @csrf
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                    </a> |

                    <form action="{{ route('jangkrik.destroy', $item->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @php
            // Tambahkan hasil panen saat ini ke total panen
            $totalPanen += floatval(str_replace(['Rp ', '.'], '', $item->hasil_panen));
            $totalModal += floatval(str_replace(['Rp ', '.'], '', $item->modal));
            $totalLaba += floatval(str_replace(['Rp ', '.'], '', $item->laba));
            @endphp
            @endforeach
            <tr>
                <td colspan="3" class="text-center"><strong>Total</strong></td>
                <td>Rp. {{ number_format($totalPanen, 2, ',', '.') }}</td>
                <td>Rp. {{ number_format($totalModal, 2, ',', '.') }}</td>
                <td>Rp. {{ number_format($totalLaba, 2, ',', '.') }}</td>
            </tr>

            <script>
                document.getElementById('bulan').addEventListener('change', function() {
                    var selectedMonth = this.value;
                    // Lakukan sesuatu dengan selectedMonth, misalnya tampilkan pesan atau kirim permintaan AJAX ke server.
                    // Contoh: console.log(selectedMonth);
                });
            </script>
            
        </table>
    </div>
</div>


@endsection
