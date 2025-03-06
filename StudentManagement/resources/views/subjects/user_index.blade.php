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

    <div id="wrapper">

        @include('Partials.slidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('Partials.navbar')

                <div class="container-fluid">

                    <h3 class="mb-4">Danh sách môn học</h3>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách môn học</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã môn học</th>
                                            <th>Tên môn học</th>
                                            <th>Ghi chú</th>
                                            <th>Số lượng thành viên</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subjects as $index => $subject)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $subject->IdSubject }}</td>
                                            <td>{{ $subject->NameSubject }}</td>
                                            <td>{{ $subject->Note }}</td>
                                            <td>{{ $subject->students_count }}</td>
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
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
