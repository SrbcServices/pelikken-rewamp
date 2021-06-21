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
                    <canvas id="myChart"></canvas>
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
                   
                   Category Wise News
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div>
                      <canvas id="category" ></canvas>
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


       var xValues = <?php echo json_encode($condinent_name) ?>;
      
       var yValues = <?php echo json_encode($news_counts) ?>;
      
        
        new Chart("myChart", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: 'rgb(255, 99, 132,0)',
              borderColor: 'rgb(255, 99, 132)',
              data: yValues
            }]
          },
          options: {
            legend: { display: false,
                      title:'News'
             },
            title: {
              display: true,
              text: "Quantinent wise News"
            },
            layout: {
            padding:{ 
              left:30,
              right:0,
            },
          
        }
          }
        });
     
        var xValues = <?php echo json_encode($category_name) ?>;
        var yValues = <?php echo json_encode($category_wise_news_count) ?>;

        new Chart("category", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
              borderWidth: 1,
              data: yValues
            }]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: "Category wise News"
            },
            layout: {
            padding:{ 
              left:30,
              right:0,
            }
            },
          },
          
        });
      </script>

      <script src="{{asset('js/plugins/chart.min.js')}}"></script>


      <script src="{{asset('js/plugins/dashboard.js')}}"></script>
      @endsection


</body>