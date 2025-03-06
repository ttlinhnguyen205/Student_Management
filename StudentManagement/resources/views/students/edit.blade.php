<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Update Student Information</title>

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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Partials.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header bg-secondary text-white text-center">
                            <h3>Cập Nhật Thông Tin Sinh Viên</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('students.update', $student->MSSV) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="studentId">MSSV</label>
                                    <input type="text" class="form-control" name="MSSV" value="{{ $student->MSSV }}" readonly>
                                </div>
                                <input type="hidden" name="MSSV" value="{{ $student->MSSV }}"> <!-- Keep the MSSV for submission -->

                                <div class="form-group">
                                    <label for="firstName">Họ</label>
                                    <input type="text" class="form-control" name="LastName" value="{{ $student->LastName }}">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Tên</label>
                                    <input type="text" class="form-control" name="FirstName" value="{{ $student->FirstName }}">
                                </div>
                                <div class="form-group">
                                    <label for="birthDate">Ngày Sinh</label>
                                    <input type="date" class="form-control" name="BirthDay" value="{{ $student->BirthDay }}">
                                </div>
                                <div class="form-group">
                                    <label for="Gender">Giới tính</label>
                                    <select name="Gender" id="Gender" class="form-control">
                                        <option value="">Chọn giới tính</option>
                                        <option value="male" {{ old('Gender', $student->Gender) == 'Male' ? 'selected' : '' }}>Nam</option>
                                        <option value="female" {{ old('Gender', $student->Gender) == 'Female' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                    @if ($errors->has('Gender'))
                                        <span class="text-danger">{{ $errors->first('Gender') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">Chọn file hình ảnh</label>
                                    <input type="file" class="form-control-file" name="Avatar" value="{{ $student->Avatar}}">
                                </div>
                                <div class="form-group">
                                    <label for="subjects">Chọn Môn Học</label>
                                    <select name="subjects[]" id="subjects" class="form-control" multiple>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->IdSubject }}" {{ in_array($subject->IdSubject, $selectedSubjects) ? 'selected' : '' }}>
                                                {{ $subject->NameSubject }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('subjects'))
                                        <span class="text-danger">{{ $errors->first('subjects') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to update?')">Save</button>
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
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
</body>

</html>