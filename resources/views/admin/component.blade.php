<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- ... (your head content remains the same) ... -->
    <meta charset="utf-8">
    <link rel="icon" href="public/images/astu.png" type="image/png">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    
    <style>
        /* Your custom styles go here */
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
<script>
    $(document).ready(function() {
        $('.angle-icon').click(function() {
            $(this).toggleClass('active');
            $(this).siblings('.stretched-link').toggle();
            $(this).closest('.card').find('.additional-content').slideToggle();
        });
    });
</script>
<body>
    <input type="checkbox" id="check">

    <!-- Include your header and sidebar components here -->
    @include('admin.header')
    @include('admin.sidebar')
    <div style="height:100px;"></div>
    @include('sweetalert::alert')

    <div class="content">
        <div class="container-fluid px-4">
            <div class="row justify-content-center">
                <!-- Bar Graph for Total PCs -->
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="totalPcChart" width="800" height="600"></canvas>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small " href="{{ url('student') }}">view students</a><br>
                            <a class="small " href="{{ url('guest') }}">view Guests</a><br>
                            <a class="small " href="{{ url('staff') }}">view Teachers</a>
                            <div class="small text-dark angle-icon" data-toggle="angle"></div>
                        </div>
                    </div>
                </div>

                <!-- Circular Graph for Granted and Ungranted Users -->
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="userStatusChart" width="400" height="400"></canvas>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small " href="{{ url('userDetails') }}">view admin</a><br>
                            <a class="small " href="{{ url('grantedUsers') }}">view granted security</a><br>
                            <a class="small " href="{{ url('ungrantedUsers') }}">view unGranted security</a>
                            <div class="small text-dark angle-icon" data-toggle="angle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        $(document).ready(function() {
            // Bar Graph for Total PCs
            var totalPcData = {
                labels: ['Total Student PC', 'Total Guest PC', 'Total Teacher PC'],
                datasets: [{
                    label: 'Total pc owners: {{$studentpc + $otherpc + $teacherpc}}',
                    data: [{{$studentpc}}, {{$otherpc}}, {{$teacherpc}}],
                    backgroundColor: ['rgba(25, 9, 132, 0.2)', 'rgba(55, 26, 86, 0.2)', 'rgba(54, 62, 25, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(255, 206, 86, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            };

            var totalPcChart = new Chart($('#totalPcChart'), {
                type: 'bar',
                data: totalPcData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Click events for clickable links
            $('#totalPcChart').click(function(evt) {
                var activePoints = totalPcChart.getElementsAtEventForMode(evt, 'nearest', { intersect: true }, true);
                if (activePoints[0]) {
                    var clickedLabel = activePoints[0]._model.label;
                    if (clickedLabel === 'Total Student PC') {
                        window.location.href = "{{ url('student') }}";
                    } else if (clickedLabel === 'Total Guest PC') {
                        window.location.href = "{{ url('guest') }}";
                    } else if (clickedLabel === 'Total Teacher PC') {
                        window.location.href = "{{ url('staff') }}";
                    }
                }
            });

            // Circular Graph for Admin, Granted, and Ungranted Users
            var userStatusData = {
                labels: ['Admin Users', 'Granted Users', 'Ungranted Users'],
                datasets: [{
                    data: [{{$admin}}, {{$user}}, {{$un}}],
                    backgroundColor: ['rgba(1, 1, 1, 0.2)', 'rgba(117, 112, 112, 0.2)', 'rgba(255, 249, 232, 0.2)'],
                    borderColor: ['rgba(1, 1, 1, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            };

            var userStatusChart = new Chart($('#userStatusChart'), {
                type: 'doughnut',
                data: userStatusData
            });

            $('#userStatusChart').click(function(evt) {
                var activePoints = userStatusChart.getElementsAtEvent(evt);
                var clickedLabel = userStatusData.labels[activePoints[0].index];
                if (clickedLabel === 'Admin Users') {
                    window.location.href = "{{ url('userDetails') }}";
                } else if (clickedLabel === 'Granted Users') {
                    window.location.href = "{{ url('grantedUsers') }}";
                } else if (clickedLabel === 'Ungranted Users') {
                    window.location.href = "{{ url('ungrantedUsers') }}";
                }
            });
        });
    </script>

    <!-- Include your footer component here -->
    @include('admin.chart')

</body>
</html>
