<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu Home</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/css/bootstrap.min.css" rel="stylesheet"> -->
    {{ HTML::style('css/css/bootstrap.min.css') }}

    <!-- Custom CSS -->
    <!-- <link href="css/css/simple-sidebar.css" rel="stylesheet"> -->
     {{ HTML::style('css/css/simple-sidebar.css') }}

    <!-- <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
     {{ HTML::style('css/font-awesome/css/font-awesome.min.css') }}

     <!-- {{  HTML::style('css/css/kamus.css') }} -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    

</head>

<body>
    
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="{{ route('home') }}">Home</a> 
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo4">
                        Assets 
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="demo4" class="collapse">
                        <li>                                    
                            <a href="{{ route('berandawilayahsungai') }}">Wilayah Sungai (WS)</a> 
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                        Admin Tools 
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                        <ul id="demo" class="collapse">
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo1">
                                User Management
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                                <ul id="demo1" class="collapse">
                                    <li>                                    
                                        <a href="{{ route('berandauser') }}">User</a> 
                                    </li>
                                    <li>                                    
                                        <a href="{{ route('berandagroup') }}">Group</a> 
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <a href="{{ route('berandacodes') }}">Codes Management</a> 
                        </li>
                         <li>
                             <a href="javascript:;" data-toggle="collapse" data-target="#demo3">
                                Menu Management
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul id="demo3" class="collapse">
                                    <li>                                    
                                        <a href="{{ route('beranda') }}">Menu</a> 
                                    </li>
                                    <li>                                    
                                        <a href="{{ route('berandadas') }}">Hak Akses</a> 
                                    </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo2">
                                Asset Management
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul id="demo2" class="collapse">
                                    <li>                                    
                                        <a href="{{ route('berandaws') }}">WS</a> 
                                    </li>
                                    <li>                                    
                                        <a href="{{ route('berandadas') }}">DAS</a> 
                                    </li>
                                     <li>                                    
                                        <a href="{{ route('beranda') }}">Sungai</a> 
                                    </li>
                            </ul>

                        </li>
                    </ul>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo1">
                                User Management
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                                <ul id="demo1" class="collapse">
                                    <li>                                    
                                        <a href="{{ route('berandauser') }}">User</a> 
                                    </li>
                                    <li>                                    
                                        <a href="{{ route('berandagroup') }}">Group</a> 
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <a href="{{ route('berandacodes') }}">Codes Management</a> 
                        </li>
                         <li>
                             <a href="javascript:;" data-toggle="collapse" data-target="#demo3">
                                Menu Management
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul id="demo3" class="collapse">
                                    <li>                                    
                                        <a href="{{ route('beranda') }}">Menu</a> 
                                    </li>
                                    <li>                                    
                                        <a href="{{ route('berandadas') }}">Hak Akses</a> 
                                    </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo2">
                                Asset Management
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul id="demo2" class="collapse">
                                    <li>                                    
                                        <a href="{{ route('berandaws') }}">WS</a> 
                                    </li>
                                    <li>                                    
                                        <a href="{{ route('berandadas') }}">DAS</a> 
                                    </li>
                                     <li>                                    
                                        <a href="{{ route('beranda') }}">Sungai</a> 
                                    </li>
                            </ul>

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}">Logout</a>
                </li>               
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Toggle Menu</a> -->
                        <button id="menu-toggle" href="#menu-toggle" type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-list"></i>
                        </button>
                        @yield('contenthome')
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

     <!-- jQuery -->
    <!--<script src="css/js/jquery.js"></script>-->
    {{ HTML::script('css/js/jquery.js') }}
    <!-- Bootstrap Core JavaScript -->
    <!--<script src="css/js/bootstrap.min.js"></script>-->
    {{ HTML::script('css/js/bootstrap.min.js') }}
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
