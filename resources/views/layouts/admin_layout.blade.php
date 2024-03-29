<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pelikken News Portal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('img/title_logo/favicon.jpg')}}">
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{asset('css/plugins/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/bootstrap-switch.css')}}">

    <link rel="stylesheet" href="{{asset('scss/_miscellaneous.scss')}}">
    <!--WOFF-->
    <link rel="stylesheet" href="{{ asset('webfonts/fa-regular-400.ttf') }}">
    <link rel="stylesheet" href="{{ asset('webfonts/fa-regular-400.woff') }}">
    <link rel="stylesheet" href="{{ asset('webfonts/fa-regular-400.woff2') }}">
    <link rel="stylesheet" href="{{ asset('webfonts/fa-solid-900.ttf') }}">
    <!--SELECT 2-->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-duallistbox.min.css') }}">
    <!--Date-Picker-->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css')}}">
    <!--Date Picker End-->
    <!--Dropzone js-->
    <link rel="stylesheet" href="{{asset('css/plugins/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/basic.css')}}">
    <!--Ionicons-->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="{{asset('css/plugins/summernote-bs4.css')}}">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>




    @yield('css')
</head>
 
<body class="hold-transition sidebar-mini layout-footer-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
               
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">{{count(get_messages())}}</span>
                    </a>
                   
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                           
                            @foreach (get_messages() as $get)
                            
                                
                            
                            <div class="media">
                                {{-- <img src="{{ asset('/images/user1.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
                                <div class="media-body">
                
                                    <h3 class="dropdown-item-title">
                                       {{$get->FullName}}
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>

                                    
                                    <p class="text-sm">{{$get->Message}}</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{date('d-m-Y', strtotime($get->created_at))}}</p>
                                </div>
                            </div>
                         <hr>
                            @endforeach
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
    
                        <a href="/admin/message" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                    
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">{{count(get_messages())}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     
                        <div class="dropdown-divider"></div>
                        <a href="/admin/message" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>{{count(get_messages())}}new messages
                            <span class="float-right text-muted text-sm">Latest</span>
                        </a>
                        
                        <div class="dropdown-divider"></div>
                        <a href="/admin/comment" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i>{{count(get_comments())}} Commends
                            <span class="float-right text-muted text-sm">Latest</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/admin/comment" class="dropdown-item dropdown-footer">See All commends</a>
                    </div>
                </li>

                <li>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-power-off"></i>
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     
                        <div class="dropdown-divider"></div>
                        <a href="/admin" class="dropdown-item">
                            <i class="fas fa-user"></i>&nbsp;&nbsp; {{Auth::user()->name}}
                           
                        </a>
                        
                        
                        <div class="dropdown-divider"></div>
                        <a href="/logout" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Log Out
                            {{-- <span class="float-right text-muted text-sm">Latest</span> --}}
                        </a>
                        
                        <div class="dropdown-divider" style="margin-bottom: 10px"></div>
                        
                    </div>

                </li>
            </ul>

            
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/admin" class="brand-link">


            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://www.pngitem.com/pimgs/m/226-2260470_transparent-admin-icon-png-admin-logo-png-png.png"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ucfirst(Auth::user()->name)}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="/admin" class="nav-link">
                                <i class="fas fa-th-large"></i>&nbsp;
                                <p>
                                    Dashboard
                                </p>
                            </a>

                            <!--MASTER START-->

                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="fa fa-database" aria-hidden="true"></i>&nbsp;

                                <p>
                                    Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/category" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/sub_category" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sub-Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/tags" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tags</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/condinent" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Continent</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/country" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Country</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/source" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Source</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--MASTER END-->

                        <li class="nav-item has-treeview menu-open">
                            <a href="" class="nav-link">
                                <i class="fas fa-newspaper"></i>&nbsp;
                                <p>
                                    News
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/all-news" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All News</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/add-news" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add News</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/arrange-news" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Arrange news</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <!--NEWS END-->
                        <li class="nav-item">
                            <a href="/admin/comment" class="nav-link">
                                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
                                <p>
                                    Comment
                                </p>
                            </a>
                        </li>
                        <!--COMMENTS END-->
                        <!--messages Start-->
                        <li class="nav-item">
                            <a href="/admin/message" class="nav-link">
                                <i class="fa fa-comment" aria-hidden="true"></i> &nbsp; <p>
                                    Messages
                                </p>
                            </a>
                        </li>
                        <!--MESSAGES END-->
                        <!--ADS START-->
                        <li class="nav-item">
                            <a href="/admin/ads" class="nav-link">
                                <i class="fas fa-ad"></i>&nbsp;
                                <p>
                                    Ads
                                </p>
                            </a>
                        </li>
                        <!--ADS END-->
                        <!--SETTINGS START-->
                        <li class="nav-item has-treeview menu-open">
                            <a href="/admin/settings" class="nav-link">
                                <i class="fa fa-cog" aria-hidden="true"></i>&nbsp; <p>
                                    Settings
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/settings" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>General Settings</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/about" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/terms" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Terms & conditions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/privacy" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Privacy and Policy</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/contact" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact Us</p>
                                    </a>
                                </li>



                            </ul>
                        </li>

                        <!--SETTINGS END-->
                        <!--CUSTOMERS START-->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="fa fa-users" aria-hidden="true"></i>&nbsp; <p>
                                    User Managment
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/user" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>staff Control</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin/subscriber" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Subscribed Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!--CUSTOMERS END-->
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        <!-- Content Wrapper. Contains page content -->


        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                
            </div>
            <strong>Copyright &copy; 2021 <a href="pelikken.com">Pelikken</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!--datepicker-->
    <script src="{{ asset('js/jquery-3-3-1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('js/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>



    



    
@yield('scripts')



</body>

</html>