<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8' />
<title>CONTOH APLIKASI</title>

<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
 {{ HTML::style('css/css/bootstrap.min.css') }}
 {{ HTML::style('css/css/stylish-portfolio.css') }}
 {{ HTML::style('css/font-awesome/css/font-awesome.min.css') }}
 {{ HTML::style('css/font-awesome/css/font-awesome.min.css') }}
 {{ HTML::style('http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic') }}
 

</head>
<body>

@yield('content')

{{ HTML::script('css/js/jquery.js') }}
{{ HTML::script('css/js/bootstrap.min.js') }}

<!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>
</html>