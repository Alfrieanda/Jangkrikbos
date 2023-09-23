@extends('layouts.template')
@section('content')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h3>Masukan Data User</h3>
                    <div class="card-body">
                        <form action="{{ route('data_user.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="nama" name="name" class="form-control" placeholder="nama">
                            </div>
                            <div class="form-group">
                                <input type="text" id="email" name="email" class="form-control" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Simpan Data User</button>
                            </div>
                            
                        </form>
                    </div>
                    
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

