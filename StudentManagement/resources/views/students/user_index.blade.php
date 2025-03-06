<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
        .birth-date-col {
            width: 150px;
        }
        .gender-col {
            width: 120px;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">

        @include('Partials.slidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('Partials.navbar')

                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tất cả sinh viên</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>MSSV</th>
                                            <th>Họ</th>
                                            <th>Tên</th>
                                            <th class="birth-date-col">Ngày sinh</th>
                                            <th class="gender-col">Giới tính</th>
                                            <th>Môn học đăng ký</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $student->MSSV }}</td>
                                            <td>{{ $student->LastName }}</td>
                                            <td>{{ $student->FirstName }}</td>
                                            <td>{{ $student->BirthDay }}</td>
                                            <td>{{ $student->Gender }}</td>
                                            <td>
                                                @if($student->subjects->isNotEmpty())
                                                    @foreach($student->subjects as $subject)
                                                        <span class="badge badge-primary">{{ $subject->NameSubject }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-danger">Chưa đăng ký môn học</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @include('Partials.footer')

        </div>

    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

</body>

</html>