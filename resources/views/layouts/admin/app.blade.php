<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Page title -->
    <title>SKBergé - Fiat</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    {{--<link rel="stylesheet" href="/vendor/fontawesome/css/font-awesome.css" />--}}
    {{--<link rel="stylesheet" href="/vendor/metisMenu/dist/metisMenu.css" />--}}
    {{--<link rel="stylesheet" href="/vendor/animate.css/animate.css" />--}}
    {{--<link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.css" />--}}

    {{--<!-- App styles -->--}}
    {{--<link rel="stylesheet" href="/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />--}}
    {{--<link rel="stylesheet" href="/fonts/pe-icon-7-stroke/css/helper.css" />--}}
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

</head>
<body>

<!-- Simple splash screen-->
{{--<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>--}}
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<div id="header">
    <div class="color-line"></div>
    <div id="logo" class="light-version">
        <span>
            SKBergé - FIAT
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">SKBergé - FIAT</span>
        </div>
        {{--<form role="search" class="navbar-form-custom" method="post" action="#">--}}
        {{--<div class="form-group">--}}
        {{--<input type="text" placeholder="Search something special" class="form-control" name="search">--}}
        {{--</div>--}}
        {{--</form>--}}
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="#">Link</a>
                    </li>
                    <li>
                        <a class="" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li>
                    <a href="#">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">{{auth()->user()->name}}</span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Links <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="#" onclick="document.getElementById('logoutForm').submit()">Cerrar sesión</a></li>
                    </ul>
                </div>


            </div>
        </div>

        <ul class="nav" id="side-menu">
            @include('layouts/menu')
        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

@yield('content')

    <form id="logoutForm" action="/logout" method="post" style="display:none">{{csrf_field()}}</form>

<!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            <a href="https://www.meat.cl">MEAT</a>
            <!-- eduaguad[at]gmail[dot]com -->
        </span>
        SKBergé &copy; {{(new \DateTime)->format('Y')}}
    </footer>

</div>

<!-- Vendor scripts -->
{{--<script src="vendor/jquery/dist/jquery.min.js"></script>--}}
{{--<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>--}}
{{--<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>--}}
{{--<script src="vendor/metisMenu/dist/metisMenu.min.js"></script>--}}

@yield('scripts')
<!-- App scripts -->
<script src="{{mix('js/app.js')}}"></script>
<script>
  /**
   * HOMER - Responsive Admin Theme
   * version 1.9
   *
   */

  $(document).ready(function () {

    // Add special class to minimalize page elements when screen is less than 768px
    setBodySmall();

    // Handle minimalize sidebar menu
    $('.hide-menu').on('click', function (event) {
      event.preventDefault();
      if ($(window).width() < 769) {
        $("body").toggleClass("show-sidebar");
      } else {
        $("body").toggleClass("hide-sidebar");
      }
    });

    // Initialize metsiMenu plugin to sidebar menu
    $('#side-menu').metisMenu();


    // Initialize animate panel function
    $('.animate-panel').animatePanel();

    // Function for collapse hpanel
    $('.showhide').on('click', function (event) {
      event.preventDefault();
      var hpanel = $(this).closest('div.hpanel');
      var icon = $(this).find('i:first');
      var body = hpanel.find('div.panel-body');
      var footer = hpanel.find('div.panel-footer');
      body.slideToggle(300);
      footer.slideToggle(200);

      // Toggle icon from up to down
      icon.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
      hpanel.toggleClass('').toggleClass('panel-collapse');
      setTimeout(function () {
        hpanel.resize();
        hpanel.find('[id^=map-]').resize();
      }, 50);
    });

    // Function for close hpanel
    $('.closebox').on('click', function (event) {
      event.preventDefault();
      var hpanel = $(this).closest('div.hpanel');
      hpanel.remove();
      if ($('body').hasClass('fullscreen-panel-mode')) {
        $('body').removeClass('fullscreen-panel-mode');
      }
    });

    // Fullscreen for fullscreen hpanel
    $('.fullscreen').on('click', function () {
      var hpanel = $(this).closest('div.hpanel');
      var icon = $(this).find('i:first');
      $('body').toggleClass('fullscreen-panel-mode');
      icon.toggleClass('fa-expand').toggleClass('fa-compress');
      hpanel.toggleClass('fullscreen');
      setTimeout(function () {
        $(window).trigger('resize');
      }, 100);
    });

    // Open close right sidebar
    $('.right-sidebar-toggle').on('click', function () {
      $('#right-sidebar').toggleClass('sidebar-open');
    });

    // Function for small header
    $('.small-header-action').on('click', function (event) {
      event.preventDefault();
      var icon = $(this).find('i:first');
      var breadcrumb = $(this).parent().find('#hbreadcrumb');
      $(this).parent().parent().parent().toggleClass('small-header');
      breadcrumb.toggleClass('m-t-lg');
      icon.toggleClass('fa-arrow-up').toggleClass('fa-arrow-down');
    });

    // Set minimal height of #wrapper to fit the window
    setTimeout(function () {
      fixWrapperHeight();
    });


    // Initialize tooltips
    $('.tooltip-demo').tooltip({
      selector: "[data-toggle=tooltip]"
    });

    // Initialize popover
    $("[data-toggle=popover]").popover();

    // Move modal to body
    // Fix Bootstrap backdrop issu with animation.css
    $('.modal').appendTo("body")

  });

  $(window).bind("load", function () {
    // Remove splash screen after load
    $('.splash').css('display', 'none')
  });

  $(window).bind("resize click", function () {

    // Add special class to minimalize page elements when screen is less than 768px
    setBodySmall();

    // Waint until metsiMenu, collapse and other effect finish and set wrapper height
    setTimeout(function () {
      fixWrapperHeight();
    }, 300);
  });

  function fixWrapperHeight() {

    // Get and set current height
    var headerH = 62;
    var navigationH = $("#navigation").height();
    var contentH = $(".content").height();

    // Set new height when contnet height is less then navigation
    if (contentH < navigationH) {
      $("#wrapper").css("min-height", navigationH + 'px');
    }

    // Set new height when contnet height is less then navigation and navigation is less then window
    if (contentH < navigationH && navigationH < $(window).height()) {
      $("#wrapper").css("min-height", $(window).height() - headerH + 'px');
    }

    // Set new height when contnet is higher then navigation but less then window
    if (contentH > navigationH && contentH < $(window).height()) {
      $("#wrapper").css("min-height", $(window).height() - headerH + 'px');
    }
  }


  function setBodySmall() {
    if ($(this).width() < 769) {
      $('body').addClass('page-small');
    } else {
      $('body').removeClass('page-small');
      $('body').removeClass('show-sidebar');
    }
  }

  // Animate panel function
  $.fn['animatePanel'] = function () {

    var element = $(this);
    var effect = $(this).data('effect');
    var delay = $(this).data('delay');
    var child = $(this).data('child');

    // Set default values for attrs
    if (!effect) {
      effect = 'zoomIn'
    }
    if (!delay) {
      delay = 0.06
    } else {
      delay = delay / 10
    }
    if (!child) {
      child = '.row > div'
    } else {
      child = "." + child
    }

    //Set defaul values for start animation and delay
    var startAnimation = 0;
    var start = Math.abs(delay) + startAnimation;

    // Get all visible element and set opacity to 0
    var panel = element.find(child);
    panel.addClass('opacity-0');

    // Get all elements and add effect class
    panel = element.find(child);
    panel.addClass('stagger').addClass('animated-panel').addClass(effect);

    var panelsCount = panel.length + 10;
    var animateTime = (panelsCount * delay * 10000) / 10;

    // Add delay for each child elements
    panel.each(function (i, elm) {
      start += delay;
      var rounded = Math.round(start * 10) / 10;
      $(elm).css('animation-delay', rounded + 's');
      // Remove opacity 0 after finish
      $(elm).removeClass('opacity-0');
    });

    // Clear animation after finish
    setTimeout(function () {
      $('.stagger').css('animation', '');
      $('.stagger').removeClass(effect).removeClass('animated-panel').removeClass('stagger');
    }, animateTime);

  };
</script>

</body>
</html>