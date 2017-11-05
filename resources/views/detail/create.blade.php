@if (Auth::user()->role !== 'admin')
  <style>

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    404 Not Found
                </div>

            </div>
        </div>
@else
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Menu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ URL::asset('css/skin-blue.min.css') }}">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <script src="https://use.fontawesome.com/75341ac20c.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>O</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Resep</b>Obat</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><i class="fa fa-user-circle" aria-hidden="true"></i> Admin</span>

            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
          
                  <img src="\images\default.jpg" class="img-circle" alt="User Image"><br>
                <p> - Admin
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a>


                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        
                  <img src="\images\default.jpg" class="img-circle" alt="User Image"><br>
        </div>
        <div class="pull-left info">
          <a href=""><h5>Admin!</h5></a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="/detail/search" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="keyword" class="form-control" placeholder="Search Branch Name..." required>
          <span class="input-group-btn">
              <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        @if (Auth::user()->role !== 'admin')
        <li class="">
          <a href="/obat">
            <i class="fa fa-lemon-o"></i> <span>Obat</span>
          </a>
        </li>
        <li class="active">
          <a href="/detail">
            <i class="fa fa-bar-chart"></i> <span>Detail</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
           </span> 
                       
          </a>

        </li>
        <li class="">
          <a href="/resep">
            <i class="fa fa-newspaper-o"></i> <span>Resep</span>
                        
          </a>

        </li>
      @else
        <li><a href="/dokter"><i class="fa fa-user"></i> <span>Dokter</span>
        
         </a></li>
        <li class="">
          <a href="/pasien"><i class="fa fa-user-circle"></i> <span>Pasien</span>
          </a>
        </li>
        <li class="">
          <a href="/obat">
            <i class="fa fa-lemon-o"></i> <span>Obat</span>
          </a>
        </li>
        <li class="">
          <a href="/resep">
            <i class="fa fa-newspaper-o"></i> <span>Resep</span>
                        
          </a>

        </li>
        <li class="">
          <a href="/pembayaran">
            <i class="fa fa-handshake-o"></i> <span>Pembayaran</span>
                        
          </a>

        </li>
        <li class="">
          <a href="/pendaftaran">
            <i class="fa fa-registered"></i> <span>Pendaftaran</span>
                        
          </a>

        </li>
        <li class="">
          <a href="/poliklinik">
            <i class="fa fa-building"></i> <span>Poliklinik</span>
                        
          </a>

        </li>
        <li class="active">
          <a href="/detail">
            <i class="fa fa-bar-chart"></i> <span>Detail</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
           </span>          
          </a>

        </li>
      </ul>
      @endif
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Detail
        <small><a href="/detail/create">Input</a></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
	<div class="container">
    <div class="row">
   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/detail" method="POST">
	<div class="form-group">
       	<label>Nomor Resep</label>
        <select name="resep_id" id="" class="form-control">
	@foreach($resep as $data)
		<option value="{{$data->nomorresep}}"
		>{{$data->nomorresep}}</option>
	@endforeach
	</select>
    </div>
		<div class="form-group">
		<label for="">Nama Obat</label>
	<select name="obat_id" id="" class="form-control">
	@foreach($obat as $data)
		<option value="{{$data->kodeobat}}"
		>{{$data->namaobat}}</option>
	@endforeach
	</select>
	</div>
			   <div class="form-group">
                  <label>Harga </label>
                  <input type="text" name="harga" placeholder="harga" class="form-control">
              </div>
              <div class="form-group">
                  <label>Dosis </label>
                  <input type="text" name="dosis" placeholder="dosis" class="form-control">
              </div>
              <div class="form-group">
                  <label>Sub Total </label>
                  <input type="text" name="subtotal" placeholder="subtotal" class="form-control">
              </div>
	
	
	
	<input type="submit" value="SUBMIT" class="btn btn-primary"><br>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
</form>	
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
   <strong>© Powered By<a href="#">  </a>2017</strong> .
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('js/app.js') }}"></script>
<!-- ownerLTE App -->
<script src="{{ URL::asset('js/Adminlte.min.js') }}"></script>

</body>
</html>
@endif