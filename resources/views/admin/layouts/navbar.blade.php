 <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      @include('admin.layouts.menu')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('public/design/adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{admin()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
          <a href="{{ aurl() }}">
            <i class="fa fa-dashboard"></i> <span>{{ trans('admin.dashboard') }}</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          <ul class="treeview-menu" >
            <li class=""><a href="{{ aurl() }}"><i class="fa fa-cog "></i> {{ trans('admin.dashboard') }}</a></li>
            <li class=""><a href="{{ aurl('settings') }}"><i class="fa fa-cog "></i> {{ trans('admin.settings') }}</a></li>
          </ul>
       
          
        </li>

        <li class=" treeview {{ active_menu('admins') [0] }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{ trans('admin.admin') }}</span>
            <span class="pull-right-container">
               
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('admins') [1] }}">
            @if (auth()->guard('admin')->user()->hasPermission('read_admins'))
            <li class="active"><a href="{{ aurl('admins') }}"><i class="fa fa-users"></i> {{ trans('admin.admin') }}</a></li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermission('create_admins'))
            <li class=""><a href="{{ aurl('admins/create') }}"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</a></li>
             @endif
          </ul>
        </li>



         <li class=" treeview {{ active_menu('users') [0] }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{ trans('admin.users') }}</span>
            <span class="pull-right-container">
               
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('users') [1] }}">
            @if (auth()->guard('admin')->user()->hasPermission('read_users'))
            <li class="active"><a href="{{ aurl('users') }}"><i class="fa fa-users"></i> {{ trans('admin.users') }}</a></li>
            @endif
             @if (auth()->guard('admin')->user()->hasPermission('create_users'))
            <li class=""><a href="{{ aurl('users/create') }}"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</a></li>
             @endif
            <li class=""><a href="{{ aurl('users') }}?level=user"><i class="fa fa-users"></i> {{ trans('admin.user') }}</a></li>
            <li class=""><a href="{{ aurl('users') }}?level=company"><i class="fa fa-users"></i> {{ trans('admin.company') }}</a></li>
            <li class=""><a href="{{ aurl('users') }}?level=vendor"><i class="fa fa-users"></i> {{ trans('admin.vendor') }}</a></li>
          </ul>
        </li>
    

     <li class=" treeview {{ active_menu('departments') [0] }}">
          <a href="#">
            <i class="fa fa-list"></i> <span>{{ trans('admin.departments') }}</span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('departments') [1] }}">
            @if (auth()->guard('admin')->user()->hasPermission('read_departments'))
            <li class="active"><a href="{{ aurl('departments') }}"><i class="fa fa-list"></i> {{ trans('admin.departments') }}</a></li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermission('create_departments'))
            <li class=""><a href="{{ aurl('departments/create') }}"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</a></li>
            @endif
          </ul>
        </li>



        <li class=" treeview {{ active_menu('offers') [0] }}">
          <a href="#">
            <i class="fa fa-list"></i> <span>{{ trans('admin.offers') }}</span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('offers') [1] }}">
            @if (auth()->guard('admin')->user()->hasPermission('read_offers'))
            <li class="active"><a href="{{ aurl('offers') }}"><i class="fa fa-list"></i> {{ trans('admin.offers') }}</a></li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermission('create_offers'))
            <li class=""><a href="{{ aurl('offers/create') }}"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</a></li>
            @endif
          </ul>
        </li>


        <li class=" treeview {{ active_menu('adds') [0] }}">
          <a href="#">
            <i class="fa fa-list"></i> <span>{{ trans('admin.adds') }}</span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('adds') [1] }}">
            <li class="active"><a href="{{ aurl('adds') }}"><i class="fa fa-list"></i> {{ trans('admin.adds') }}</a></li>
          </ul>
        </li>
        
       
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>