<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Chào mừng đến với trang quản lý sinh viên</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Total Students -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số sinh viên</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">1,234</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Graduated Students -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sinh viên đã tốt nghiệp</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">350</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Students Enrolled This Year -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sinh viên nhập học năm nay</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">500</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Yêu cầu đang chờ</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="row mt-4">
            <!-- Recent Students -->
            <div class="col-xl-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-header font-weight-bold">Sinh viên mới</div>
                    <div class="card-body">
                        <ul>
                            <li>John Doe - Ngày nhập học: 01/03/2025</li>
                            <li>Jane Smith - Ngày nhập học: 10/02/2025</li>
                            <li>Bob Lee - Ngày nhập học: 25/01/2025</li>
                            <li>Alice Zhang - Ngày nhập học: 15/01/2025</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Latest Announcements -->
            <div class="col-xl-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-header font-weight-bold">Thông báo mới nhất</div>
                    <div class="card-body">
                        <ul>
                            <li>Họp thường niên của trường - 05/03/2025</li>
                            <li>Khai giảng học kỳ mới - 01/04/2025</li>
                            <li>Bầu cử Hội sinh viên - 20/03/2025</li>
                            <li>Lễ tốt nghiệp - 10/06/2025</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
