
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>online Shopping</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="screen"/> 
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="{{ asset('js/google-code-prettify/prettify.css') }}" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
	<style type="{{ asset ('text/css') }}" id="enject"></style>
  </head>
  
<body>

<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> @guest @else {{ Auth::user()->fname }} @endguest</strong></div>
	<div class="span6">
	</div>
</div>


<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">

<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>

  <div class="navbar-inner">
		<form class="form-inline navbar-search" method="post" action="#" >
            <input id="srchFld" class="srchTxt" type="text" />
            <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
      </form>

    <ul id="topMenu" class="nav pull-right">
	 <li class="">

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
            @else
                <li> <a href="#"> {{ Auth::user()->lname }}  </a> </li>
                <li> 
                    <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
               
            @endguest

	</li>
    </ul>
  </div>
</div>
</div>
</div>

<!-- Header End====================================================================== -->

        <main class="py-4">
            @yield('content')
        </main>

<!-- Footer ================================================================== -->
<div  id="footerSection">
    <div class="container">
    <div class="row" align="center">
        <div id="socialMedia">
            <h5>SOCIAL MEDIA </h5>
            <a href="#"><img width="60" height="60" src="{{asset('images/facebook.png')}}" title="facebook" alt="facebook"/></a>
            <a href="#"><img width="60" height="60" src="{{asset('images/twitter.png')}}" title="twitter" alt="twitter"/></a>
            <a href="#"><img width="60" height="60" src="{{asset('images/youtube.png')}}" title="youtube" alt="youtube"/></a>
            </div> 
        </div>
    </div><!-- Container End -->
</div>

<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/google-code-prettify/prettify.js') }}"></script>

<script src="{{ asset('js/bootshop.js') }}"></script>
<script src="{{ asset('js/jquery.lightbox-0.5.js') }}"></script>

</body>
</html>