@extends ('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{ route('cetakchart.index') }}?print=true" target="_blank" class="btn btn-sm btn-success shadow-sm mr-2 no-print">
            <i class="fa fa-file fa-sm text-white-100"></i> Cetak Pdf
        </a>
    </div>
    <form method="GET" action="#" class="form-inline">
        @csrf
        <label for="bulan">Grafik:</label>
        <select id="grafik" name="grafik" class="form-control ml-2">
            <option value="omset-pengeluaran">Omset dan Pengeluaran</option>
            <option value="telur-panen">Telur dan Panen</option>
            <!-- Tambahkan opsi lainnya jika diperlukan -->
        </select>
        <button type="submit" class="btn btn-primary ml-2">Go</button>
    </form>

    <div id="highchart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    {{-- <div style="display: flex; justify-content: center;">
        <div style="flex-basis: 48%;">
            <h2>Data Omset:</h2>
            <ul>
                @foreach($omsets as $omset)
                    <?php
                    // Menghapus tanda titik ribuan dan mengonversi ke float
                    $omsetFloat = floatval(str_replace('.', '', $omset));
                    ?>
                    <li>Rp {{ number_format($omsetFloat, 0, ',', '.') }}</li>
                @endforeach
            </ul>
        </div>
        <div style="flex-basis: 48%;">
            <h2>Data Pengeluaran:</h2>
            <ul>
                @foreach($pengeluarans as $pengeluaran)
                    <?php
                    // Menghapus tanda titik ribuan dan mengonversi ke float
                    $pengeluaranFloat = floatval(str_replace('.', '', $pengeluaran));
                    ?>
                    <li>Rp {{ number_format($pengeluaranFloat, 0, ',', '.') }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Menambahkan bagian data Telur dan Panen -->
    <div id="data-telur-panen" style="display: none;">
        <div style="display: flex; justify-content: center;">
            <div style="flex-basis: 48%;">
                <h2>Data Telur:</h2>
                <ul>
                    @foreach($telurs as $telur)
                        <?php
                        // Menghapus tanda titik ribuan dan mengonversi ke float
                        $telurFloat = floatval(str_replace('.', '', $telur));
                        ?>
                        <li>{{ $telurFloat }}</li>
                    @endforeach
                </ul>
            </div>
            <div style="flex-basis: 48%;">
                <h2>Data Panen:</h2>
                <ul>
                    @foreach($panens as $panen)
                        <?php
                        // Menghapus tanda titik ribuan dan mengonversi ke float
                        $panenFloat = floatval(str_replace('.', '', $panen));
                        ?>
                        <li>{{ $panenFloat }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div> --}}

    <script>
        jQuery(document).ready(function($) {
            // Inisialisasi data grafik
            var dataOmset = [14040000, 23031000, 23787000, 21280000, 44343213, 14040000, 44343213, 44343213, 14040000, 14040000, 12233312, 50000000];
            var dataPengeluaran = [10000000, 14980000, 18460000, 14700000, 12324230, 8890000, 14700000, 23434120, 8890000, 10000000, 5000000, 23000000];


            var dataTelur = [635, 107, 142, 105, 123, 123, 625, 625, 635, 635, 651, 333];
            var dataPanen = [540, 853, 881, 760, 540, 122, 540, 540, 540, 540, 122, 111];

            var chart = Highcharts.chart('highchart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Omset dan Pengeluaran'
                },
                xAxis: {
                    categories: ['Bulan 1', 'Bulan 2', 'Bulan 3', 'Bulan 4', 'Bulan 5', 'Bulan 6', 'Bulan 7', 'Bulan 8', 'Bulan 9', 'Bulan 10', 'Bulan 11', 'Bulan 12']
                },
                yAxis: {
                    title: {
                        text: 'Total'
                    }
                },
                series: [{
                    name: 'Omset',
                    data: dataOmset
                }, {
                    name: 'Pengeluaran',
                    data: dataPengeluaran
                }],
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            formatter: function() {
                                return Highcharts.numberFormat(this.y, 0, ',', '.');
                            }
                        }
                    }
                }
            });

            // Tambahkan event handler untuk perubahan pada dropdown
            $('#grafik').on('change', function() {
                var selectedOption = $(this).val();

                if (selectedOption === 'omset-pengeluaran') {
                    chart.update({
                        title: {
                            text: 'Grafik Omset dan Pengeluaran'
                        },
                        series: [{
                            name: 'Omset',
                            data: dataOmset
                        }, {
                            name: 'Pengeluaran',
                            data: dataPengeluaran
                        }]
                    });
                    // Perbarui data Telur dan Panen menjadi data Omset dan Pengeluaran
                    $('#data-telur-panen').hide();
                } else if (selectedOption === 'telur-panen') {
                    chart.update({
                        title: {
                            text: 'Grafik Telur dan Panen'
                        },
                        series: [{
                            name: 'Telur',
                            data: dataTelur
                        }, {
                            name: 'Panen',
                            data: dataPanen
                        }]
                    });
                    // Perbarui data Omset dan Pengeluaran menjadi data Telur dan Panen
                    $('#data-telur-panen').show();
                }
            });

            // Inisialisasi tampilan awal
            $('#data-telur-panen').hide();
        });


        $.ajax({
            url: '/url/ke/rmjangkrik', // Ganti dengan URL yang sesuai
            method: 'POST', // Gunakan method yang sesuai (POST atau GET)
            data: {
                // Kirim data yang diperlukan untuk menambahkan data baru
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Perbarui data grafik dengan data baru
                    dataOmset.push(response.data.omset);
                    dataPengeluaran.push(response.data.pengeluaran);
                    dataTelur.push(response.data.telur);
                    dataPanen.push(response.data.panen);

                    // Perbarui grafik
                    chart.update({
                        series: [{
                            name: 'Omset',
                            data: dataOmset
                        }, {
                            name: 'Pengeluaran',
                            data: dataPengeluaran
                        }]
                        
                    });
                } else {
                    // Handle kesalahan jika diperlukan
                    console.error('Gagal menambahkan data baru.');
                }
            },
            error: function() {
                // Handle kesalahan jika diperlukan
                console.error('Gagal menambahkan data baru.');
            }
        });
    </script>
    
</div>
@endsection
