<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Partials.slidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Partials.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Hiển thị thông báo lỗi chung -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card">
                        <div class="card-header bg-secondary text-white text-center">
                            <h3>Thêm môn học</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subjects.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="IdSubject">Mã môn học:</label>
                                    <input type="text" class="form-control" name="IdSubject" value="{{ old('IdSubject') }}" placeholder="Nhập mã môn học" required>
                                    @if ($errors->has('IdSubject'))
                                        <span class="text-danger">{{ $errors->first('IdSubject') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="NameSubject">Tên môn học:</label>
                                    <input type="text" class="form-control" name="NameSubject" value="{{ old('NameSubject') }}" placeholder="Nhập tên môn học" required>
                                    @if ($errors->has('NameSubject'))
                                        <span class="text-danger">{{ $errors->first('NameSubject') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="Note">Ghi Chú:</label>
                                    <input type="text" class="form-control" name="Note" value="{{ old('Note') }}" placeholder="Nhập ghi chú">
                                    @if ($errors->has('Note'))
                                        <span class="text-danger">{{ $errors->first('Note') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="start_date">Ngày bắt đầu:</label>
                                    <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
                                    @if ($errors->has('start_date'))
                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="end_date">Ngày kết thúc:</label>
                                    <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
                                    @if ($errors->has('end_date'))
                                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-sm btn-success" type="submit" name="add" value="Save">
                                    <a href="{{ route('subjects.index') }}" class="btn btn-sm btn-primary">Previous</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('Partials.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
