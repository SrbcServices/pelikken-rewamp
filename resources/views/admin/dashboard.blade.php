@extends('layouts.admin_layout')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<!-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
<!-- iCheck -->
<!-- <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
<!-- JQVMap -->
<!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
<!-- Theme style -->
<!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
<!-- overlayScrollbars -->
<!-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
<!-- Daterange picker -->
<!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
<!-- summernote -->
<!-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$news_count}}</h3>

                <p>Total News</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag" style="color:#f2f2f2"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" style="color:#f2f2f2">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Latest News</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$comments_count}}</h3>

                <p>Comments</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->

        <div class="row">
          <!-- Left col -->
          <!-- Custom tabs (Charts with tabs 1)-->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  
                  Continent Wise
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div>
                    <canvas id="myChart" style="max-width:700px"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

              <!-- Custom tabs (Charts with tabs 1)-->
              <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                   
                   User Interaction
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div>
                      <canvas id="myChart1" style="max-width:700px"></canvas>
                    </div>
                  </div><!-- /.card-body -->
                </div>

              </div>
            </div>
          </div>
        </div>
          <!-- /.card-body -->
      </div>
        <!-- Custom tabs (Charts with tabs 2)-->
        <!-- /.card -->
</div>


      <!-- Left col -->




      @endsection
      @section('scripts')
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


      <script>
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = ["#dc3545", "#28a745", "#17a2b8", "#ffc107", "brown"];

        new Chart("myChart", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: "World Wine Production 2018"
            }
          }
        });
      </script>

      <script>
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = ["#dc3545", "#28a745", "#17a2b8", "#ffc107", "brown"];

        new Chart("myChart1", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: "World Wine Production 2018"
            }
          }
        });
      </script>

      <script src="{{asset('js/plugins/chart.min.js')}}"></script>

      <!-- Sparkline -->
      <script src="plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="plugins/moment/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="{{asset('js/plugins/dashboard.js')}}"></script>
      @endsection
      <!-- jQuery -->

</body>