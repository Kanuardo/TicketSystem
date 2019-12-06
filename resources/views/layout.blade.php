<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon icon -->

    <title>Tickets</title>

    <!-- common css -->
    <link rel="stylesheet" href="/css/front.css">


    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.js"></script>
    <![endif]-->



</head>

<body>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    @if(\Illuminate\Support\Facades\Auth::check())
                    <li><a href="/home">Главная </a></li>
                    <li><a href="/create">Создать тикет </a></li>

                </ul>


                <ul class="nav navbar-nav text-uppercase pull-right">
                    <li><a href="/home" >{{Auth::user()-> name}}</a></li>
                    <li><a href="/logout">Logout</a></li>
                   @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>

                        @endif
                </ul>

            </div>
            <!-- /.navbar-collapse -->


            <div class="show-search">
                <form role="search" method="get" id="searchform" action="#">
                    <div>
                        <input type="text" placeholder="Search and hit enter..." name="s" id="s">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>


<!--main content start-->
@yield('content')
<!-- end main content-->
<!--footer start-->



<!-- js files -->

<script src="/js/front.js"></script>

</body>
</html>