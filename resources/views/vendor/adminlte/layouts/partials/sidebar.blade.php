<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif
        {{--
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        --}}
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Escritorio</span></a></li>
            @if(Auth::user()->level == 1)
            <li class="treeview {{ Route::is('businesses.index') || Route::is('businesses.create') ? 'active' : '' }}">
                <a href="#"><i class='fa fa-building'></i> <span>Empresas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('businesses.index') }}">Ver</a></li>
                    <li><a href="{{ route('businesses.create') }}">Agregar</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->level == 1 || Auth::user()->level == 2)
            <li class="treeview  {{ Route::is('users.index') || Route::is('users.create') ? 'active' : '' }}">
                <a href="#"><i class='fa fa-user'></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.index') }}">Ver</a></li>
                    <li><a href="{{ route('users.create') }}">Agregar</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->level == 2)
            <li class="treeview {{ Route::is('vehicles.index') || Route::is('vehicles.create') ? 'active' : '' }}">
                <a href="#"><i class='fa fa-car'></i> <span>Vehículos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('vehicles.index') }}">Ver</a></li>
                    <li><a href="{{ route('vehicles.create') }}">Agregar</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->level == 2)
            <li class="treeview  {{ Route::is('routes.index') || Route::is('routes.create') ? 'active' : '' }}">
                <a href="#"><i class='fa fa-road'></i> <span>Rutas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('routes.index') }}">Ver</a></li>
                    <li><a href="{{ route('routes.create')  }}">Agregar</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->level == 2)
            <li class="treeview  {{ Route::is('kat33s.index') || Route::is('kat33s.create') ? 'active' : '' }}">
                <a href="#"><i class='fa fa-wifi'></i> <span>KAT33</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('kat33s.index') }}">Ver</a></li>
                    <li><a href="{{ route('kat33s.create') }}">Agregar</a></li>
                </ul>
            </li>
            @endif

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
