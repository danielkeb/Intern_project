<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .angle-icon.active {
            transform: rotate(90deg);
        }

        .stretched-link {
            flex-grow: 1;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <input type="checkbox" id="check">

    @include('admin.header');
    @include('admin.sidebar');

    <div class="content">
        <div class="container-fluid px-4">
            <div class="row justify-content-center">

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <canvas id="adminChart" width="400" height="400"></canvas>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('userDetails')}}">Users Detail</a>
                            <div class="small text-white angle-icon" data-toggle="angle"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <canvas id="studentChart" width="400" height="400"></canvas>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('student')}}">Users Detail</a>
                            <div class="small text-white angle-icon" data-toggle="angle"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <canvas id="guestChart" width="400" height="400"></canvas>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('guest')}}">Users Detail</a>
                            <div class="small text-white angle-icon" data-toggle="angle"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <canvas id="grantedChart" width="400" height="400"></canvas>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('usersDetails')}}">Users Detail</a>
                            <div class="small text-white angle-icon" data-toggle="angle"></div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <canvas id="unGrantedChart" width="400" height="400"></canvas>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('usersDetail')}}">Users Detail</a>
                            <div class="small text-white angle-icon" data-toggle="angle"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var adminData = {{ $admin }};
            var studentData = {{ $studentpc }};
            var guestData = {{ $otherpc }};

            var adminChartConfig = {
                type: 'bar',
                data: {
                    labels: ['Total Admin'],
                    datasets: [{
                        label: 'Admins',
                        data: [adminData],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            var studentChartConfig = {
                type: 'bar',
                data: {
                    labels: ['Total Student PC'],
                    datasets: [{
                        label: 'Students',
                        data: [studentData],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            var guestChartConfig = {
                type: 'bar',
                data: {
                    labels: ['Total Guest PC'],
                    datasets: [{
                        label: 'Guests',
                        data: [guestData],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            var grantedChartConfig = {
                type: 'bar',
                data: {
                    labels: ['Total Granted security'],
                    datasets: [{
                        label: 'Granted security',
                        data: [grantedData],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            var unGrantedChartConfig = {
                type: 'bar',
                data: {
                    labels: ['Total unGranted security'],
                    datasets: [{
                        label: 'unGranted security',
                        data: [unGrantedData],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            var adminChart = new Chart($('#adminChart'), adminChartConfig);
            var studentChart = new Chart($('#studentChart'), studentChartConfig);
            var guestChart = new Chart($('#guestChart'), guestChartConfig);
            var grantedChart = new Chart($('#grantedChart'), gratedtChartConfig);
            var unGrantedChart = new Chart($('#unGrantedChart'), unGrantedChartConfig);
        });
    </script>

    @include('admin.footer')

</body>

</html>
