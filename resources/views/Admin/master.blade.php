<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>{{$title}}</title>
    <base href="{{asset('')}}">
    <!--Core CSS -->
    <link href="backend/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="backend/css/bootstrap-reset.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="backend/css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="backend/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="backend/js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/style-responsive.css" rel="stylesheet"/>
    <script src="backen/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    
    <![endif]-->
    
</head>
<body>
@yield('head')
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="" class="logo">
        <img style="max-width:50px" src="backend/images/logoD.jpg" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li style="display:flex;">
            <input type="text" class="form-control search" placeholder=" Tìm kiếm">
             <button style="margin-left:5px; height:33px;width:125px;" >Tìm Kiếm</button>
        </li>
       
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Danh Mục</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Danh mục </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.menus.list')}}">Danh sách danh mục</a></li>
                        <li><a href="{{route('admin.menus.add')}}">Thêm  danh mục</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.product.list')}}">Danh sách sản phẩm</a></li>
                        <li><a href="{{route('admin.product.create')}}">Thêm sản phẩm</a></li>
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Mạng xã hội</span>
                    </a>
                   
                </li>
              
                <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<section class="wrapper">
<div class="row">
    <div class="col-md-12">
    <section class="panel " >
        <div class="panel-heading bg-primary">
            {{$title}}
        </div>
    </section>
    </div>
</div>
  @yield('content')


</section>
</section>
<!--main content end-->



   
<!--right sidebar end-->
</section>



<!--common script init for all pages-->
<script src="backend/js/main.js"></script>
<!--script for this page-->
@yield('footer')
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="backend/js/jquery.js"></script>
<script src="backend/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="backend/bs3/js/bootstrap.min.js"></script>
<script src="backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="backend/js/jquery.scrollTo.min.js"></script>
<script src="backend/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="backend/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="backend/js/skycons/skycons.js"></script>
<script src="backend/js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="backend/js/calendar/clndr.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="backend/js/calendar/moment-2.2.1.js"></script>
<script src="backend/js/evnt.calendar.init.js"></script>
<script src="backend/js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="backend/js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<script src="backend/js/gauge/gauge.js"></script>
<!--clock init-->
<script src="backend/js/css3clock/js/css3clock.js"></script>
</body>
</html>