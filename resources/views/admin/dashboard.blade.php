@extends('layouts.admin_layout')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
                <h3>{{$trending_news}}<sup style="font-size: 20px"></sup></h3>

                <p>Trending</p>
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

                

                <h3>{{$register}}</h3>

               

                <p>Registered User</p>  
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
console.log(JSON.parse({{$condinent_name}}))

        var xValues = JSON.parse({{$condinent_name}});
        var yValues = "{{$news_counts}}";
        var barColors = ["#dc3545", "#28a745","#28a745"];

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
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina", "Spain", "USA", "Argentina"];
        var yValues = [20, 15, 28, 10, 60, 70, 80, 90];
        var barColors = ["#dc3545", "#28a745", "#17a2b8", "#ffc107", "brown","#dc3545", "#28a745", "#17a2b8",];

        new Chart("myChart1", {
          type: "line",
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


      <script src="{{asset('js/plugins/dashboard.js')}}"></script>
      @endsection


</body>