<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Partials.slidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Partials.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card">
                        <div class="card-header bg-secondary text-white text-center">
                            <h3>Thêm Sinh Viên Mới</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="mssv">Mã Sinh Viên</label>
                                    <input type="text" class="form-control @error('MSSV') is-invalid @enderror" id="mssv" name="MSSV" placeholder="Nhập mã sinh viên" value="{{ old('MSSV') }}" required>
                                    @error('MSSV')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Họ</label>
                                    <input type="text" class="form-control @error('LastName') is-invalid @enderror" id="lastname" name="LastName" placeholder="Nhập họ sinh viên" value="{{ old('LastName') }}" required>
                                    @error('LastName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="firstname">Tên</label>
                                    <input type="text" class="form-control @error('FirstName') is-invalid @enderror" id="firstname" name="FirstName" placeholder="Nhập tên sinh viên" value="{{ old('FirstName') }}" required>
                                    @error('FirstName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="date" class="form-control @error('BirthDay') is-invalid @enderror" id="birthday" name="BirthDay" value="{{ old('BirthDay') }}" required>
                                    @error('BirthDay')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gender">Giới tính</label>
                                    <select class="form-control @error('Gender') is-invalid @enderror" id="gender" name="Gender" required>
                                        <option value="male" {{ old('Gender') == 'male' ? 'selected' : '' }}>Nam</option>
                                        <option value="female" {{ old('Gender') == 'female' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                    @error('Gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Chọn file hình ảnh</label>
                                    <input type="file" class="form-control-file" name="Avatar" >
                                </div>

                                <div class="form-group">
                                    <label for="subject">Môn học</label>
                                    <select class="form-control @error('IdSubject') is-invalid @enderror" name="IdSubject[]" multiple required>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->IdSubject }}" 
                                                {{ (collect(old('IdSubject'))->contains($subject->IdSubject)) ? 'selected' : '' }}>
                                                {{ $subject->NameSubject }}
                                            </option>
                                        @endforeach
                                    </select>                                  
                                    @error('IdSubject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif


                                <div class="form-group">
                                    <input class="btn btn-sm btn-success" type="submit" name="add" value="Lưu">
                                    <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary">Trở lại</a>
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
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    {{-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    

</body>

</html>