<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GESTION DASER') }}</title>

    <link type="text/css"  href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/Ionicons/css/ionicons.min.css">

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="/css/bootstrap-table.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('path') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{ config('app.name', 'GESTION DASER') }}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Connexion</a></li>
                            <li><a href="{{ route('register') }}">Enregister</a></li>
                        @else
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/img/user2-160x160.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>{{ Auth::user()->email }}</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Deconnexion
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        @if (Auth::guest())
        @else
          <p>{{ Auth::user()->name }}</p>
        @endif
          <a href="#"><i class="fa fa-circle text-success"></i> en ligne</a>
        </div>
      </div>
      {{-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
       /.search form  --}}
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="treeview @if(Request::is('home')) active @endif">
          <a href="@if(Request::is('home')) javascript:void @else {{ url('/home') }} @endif"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span></a>
        </li>

        {{-- Navigation --}}
          <li class="header">NAVIGATION</li>
          
          <li class="treeview @if(Request::is('sales/*')) active @endif">
            <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>Ventes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('sales/create')) active @endif"><a href="{{ url('/sales/create') }}"><i class="fa fa-circle-o"></i> Ajouter des ventes</a></li>
              <li class="@if(Request::is('sales/view')) active @endif"><a href="{{ url('/sales/view') }}"><i class="fa fa-circle-o"></i> Afficher les ventes</a></li>
            </ul>
          </li>

          <li class="treeview @if(Request::is('customer/*')) active @endif">
            <a href="#">
              <i class="fa fa-group"></i> <span>Les clients</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('customer/create')) active @endif"><a href="{{ url('/customer/create') }}"><i class="fa fa-circle-o"></i> Ajouter Les clients</a></li>
              <li class="@if(Request::is('customer/view')) active @endif"><a href="{{ url('/customer/view') }}"><i class="fa fa-circle-o"></i> Voir Les clients</a></li>
            </ul>
          </li>

          <li class="treeview @if(Request::is('purchase/*')) active @endif">
            <a href="#">
              <i class="fa fa-shopping-bag"></i> <span>Achat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('purchase/create')) active @endif"><a href="{{ url('/purchase/create') }}"><i class="fa fa-circle-o"></i> Ajouter des achats</a></li>
              <li class="@if(Request::is('purchase/view')) active @endif"><a href="{{ url('/purchase/view') }}"><i class="fa fa-circle-o"></i> Voir les achats</a></li>
            </ul>
          </li>

          <li class="treeview @if(Request::is('supplier/*')) active @endif">
            <a href="#">
              <i class="fa fa-truck"></i> <span>Fournisseur</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('supplier/create')) active @endif"><a href="{{ url('/supplier/create') }}"><i class="fa fa-circle-o"></i> Ajouter des Fournisseur</a></li>
              <li class="@if(Request::is('supplier/view')) active @endif"><a href="{{ url('/supplier/view') }}"><i class="fa fa-circle-o"></i> Voir les Fournisseur</a></li>
            </ul>
          </li>

          <li class="treeview @if(Request::is('stock/*') || Request::is('category/*')) active @endif">
            <a href="#">
              <i class="fa fa-briefcase"></i> <span>Stocks / Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('stock/create')) active @endif"><a href="{{ url('/stock/create') }}"><i class="fa fa-circle-o"></i> Ajouter un Stock / Product</a></li>
              <li class="@if(Request::is('stock/view')) active @endif"><a href="{{ url('/stock/view') }}"><i class="fa fa-circle-o"></i> Voir Stock / Product</a></li>
              <li class="@if(Request::is('category/create')) active @endif"><a href="{{ url('/category/create') }}"><i class="fa fa-circle-o"></i> Ajouter  Categories stock</a></li>
              <li class="@if(Request::is('category/view')) active @endif"><a href="{{ url('/category/view') }}"><i class="fa fa-circle-o"></i> Voir Categories stock</a></li>
              <li class="@if(Request::is('stock/view/availability')) active @endif"><a href="{{ url('/stock/view/availability') }}"><i class="fa fa-circle-o"></i> Voir Stock disponible</a></li>
            </ul>
          </li>

          <li class="treeview @if(Request::is('transaction/payments')) active @endif">
            <a href="@if(Request::is('transaction/payments')) javascript:void @else {{ url('/transaction/payments') }} @endif">
              <i class="fa fa-inr"></i> <span>Paiements</span>
            </a>
          </li>

          <li class="treeview @if(Request::is('transaction/outstandings')) active @endif">
            <a href="@if(Request::is('transaction/outstandings')) javascript:void @else {{ url('/transaction/outstandings') }} @endif">
              <i class="fa fa-credit-card"></i> <span>solde impayé</span>
            </a>
          </li>

          <li class="treeview @if(Request::is('report/generate')) active @endif">
            <a href="@if(Request::is('report/generate')) javascript:void @else /report/generate @endif">
              <i class="fa fa-line-chart"></i> <span>Rapports</span>
            </a>
          </li>

        {{-- END OF NAVIGATION --}}

        {{-- Direct Links --}}

          <li class="header">Liens directs</li>
          <li class="@if(Request::is('sales/create')) active @endif"><a href="@if(Request::is('sales/create')) javascript:void @else /sales/create @endif"><i class="fa fa-circle-o text-success"></i> <span>Nouvelle vente</span></a></li>
          <li class="@if(Request::is('purchase/create')) active @endif"><a href="@if(Request::is('purchase/create')) javascript:void @else /purchase/create @endif"><i class="fa fa-circle-o text-red"></i> <span>Nouvelle achat</span></a></li>
          <li class="@if(Request::is('supplier/create')) active @endif"><a href="@if(Request::is('supplier/create')) javascript:void @else /supplier/create @endif"><i class="fa fa-circle-o text-aqua"></i> <span>Nouveau fournisseur</span></a></li>
          <li class="@if(Request::is('customer/create')) active @endif"><a href="@if(Request::is('customer/create')) javascript:void @else /customer/create @endif"><i class="fa fa-circle-o text-yellow"></i> <span>Nouveau client</span></a></li>
          <li class="@if(Request::is('report/generate')) active @endif"><a href="@if(Request::is('report/generate')) javascript:void @else /report/generate @endif"><i class="fa fa-circle-o text-primary"></i> <span>Générer un rapport</span></a></li>

        {{-- END OF Direct Links --}}

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="#" target="_blank">DASER TELECOM</a></strong>
  </footer>

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Activité récente</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside> --}}
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="/js/app.js"></script>
<script src="/js/app.min.js"></script>
<script src="/js/bootstrapValidator.min.js"></script>
<script src="/js/default.js"></script>
<script src="/js/bootstrap-table.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/Chart.min.js"></script>
<script type="text/javascript" src="/js/barchart.js"></script>
</body>
</html>
