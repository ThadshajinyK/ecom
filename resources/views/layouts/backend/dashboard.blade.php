
<!doctype html>
<html lang="en">

<head>
  <title>E-com</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="{{ asset('css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
  <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          E-COM
        </a>
        <a href="#" class="simple-text logo-normal">
          PROJECT
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li class="nav-item active  ">
            <a class="nav-link" href="{{ route('admin') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="">
            <a class="nav-link" href="{{ route('customer.index') }}">
              <i class="material-icons"> Customer </i>
              <p>Customer</p>
            </a>
          </li>

          <li class="">
            <a class="nav-link" href="{{ route('product.index') }}">
              <i class="material-icons"> Products </i>
              <p>Products</p>
            </a>
          </li>

          <li class="">
            <a class="nav-link" href="{{ route('categary.index') }}">
              <i class="material-icons"> Categaries </i>
              <p>Categaries</p>
            </a>
          </li>

          <li class="">
            <a class="nav-link" href="{{ route('order.index') }}">
              <i class="material-icons"> Orders </i>
              <p>Orders</p>
            </a>
          </li>

          <li class="">
            <a class="nav-link" href="{{ route('shipping.index') }}">
              <i class="material-icons"> Shippments </i>
              <p>Shippments</p>
            </a>
          </li>

          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">

          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>

          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">notifications</i> Notifications
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="material-icons">logout</i> {{ __('Logout') }}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>        
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="material-icons">account_circle</i> {{ Auth::user('admin')->name }}
                </a>
              </li>

            </ul>
          </div>

        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
        @include('layouts.flash-message')
        @yield('content')
          <!-- your content here -->
        </div>
      </div>

      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  E-COM
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
              <b> Final Project </b>
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/product.js') }}"></script>
</body>

</html>