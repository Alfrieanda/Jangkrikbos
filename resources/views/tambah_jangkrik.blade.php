@extends('layouts.template')
@section('content')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h3>Masukan Data</h3>
                    <div class="card-body">
                        <form action="{{ route('jangkrik.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="tahapan_panen">Tahapan Panen</label>
                                <input type="text" id="tahapan_panen" name="tahapan_panen" class="form-control" 
                                placeholder="tahapan_panen">
                            </div>
                            <div class="form-group">
                                <label for="waktu">Waktu</label>
                                <input type="date" id="waktu" name="waktu" class="form-control" 
                                placeholder="waktu">
                            </div>
                            <div class="form-group">
                                <label for="hasil_panen">Hasil Panen</label>
                                <input type="text" id="hasil_panen" name="hasil_panen" class="form-control" 
                                    placeholder="hasil_panen" onkeyup="formatNumber(this)">
                            </div>
                            <div class="form-group">
                                <label for="modal">Modal</label>
                                <input type="text" id="modal" name="modal" class="form-control" 
                                    placeholder="modal" onkeyup="formatNumber(this)">
                            </div>
                            <div class="form-group">
                                <label for="laba">Laba</label>
                                <input type="text" id="laba" name="laba" class="form-control" 
                                    placeholder="laba" onkeyup="formatNumber(this)">
                            </div>
                            
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control" 
                                placeholder="keterangan">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Simpan Data</button>
                            </div>
                            
                        </form>
                    </div>
                    
                    <script>
                        // Fungsi untuk memformat input dengan titik tengah
                        function formatNumber(input) {
                            var value = input.value.replace(/\D/g, "");
                            var formattedValue = new Intl.NumberFormat("id-ID").format(value);
                            input.value = formattedValue;
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

