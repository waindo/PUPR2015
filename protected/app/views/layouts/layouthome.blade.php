<?php
function get_menu($data, $parent = 0) {

static $i = 1;
    $tab = str_repeat("\t\t", $i);
    if (isset($data[$parent])) {
        $html = "\n$tab";
        $i++;
        foreach ($data[$parent] as $v) {
            $child = get_menu($data, $v->menuxxmenuidx);
            $html .= "\n\t$tab<li>";
            
            if ($child) {
                $i--;
                $html .= '<a href="javascript:;" data-toggle="collapse" data-target="#'.$v->menuxxurlxxxx.'">'.$v->menuxxtitlexx;
                $html .= '<i class="fa fa-fw fa-caret-down"></i>';
                $html .= '</a>';
                $html .= "\n\t$tab<ul ";
                $html .= 'id="'.$v->menuxxurlxxxx.'" class="collapse">';
                

                $child2 = get_menu($data, $v->menuxxmenuidx);
                $html .= "\n\t$tab";
                if ($child2) {
                    $i--;
                    $html .= $child2;
                    $html .= "\n\t$tab";
                }
                $html .= "\n\t$tab";
                $html .= "\n\t$tab</ul>";
            } else {
                $html .= '<a href="'.$v->menuxxurlxxxx.'">'.$v->menuxxtitlexx.'</a>';
                
            }
            
            $html .= '</li>';
        }
        $html .= "\n$tab";
        return $html;
    } else {
        return false;
    }
}


$conn = pg_connect("host=localhost port=5432 dbname='dbpupr' user='pupr' password='pupr'");
$result = pg_query($conn,"SELECT * FROM menuxx ORDER BY menuxxmnuordr");
while ($row =  pg_fetch_object($result)) {
    $data[$row->menuxxparntid][] = $row;
}
    $menu = get_menu($data);
?>


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
                <?php echo $menu; ?>
                <br style="clear: left" />
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
