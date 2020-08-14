<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{Request::segment(1) == 'dashboard' ? 'active' : ''}}">
                    <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                <li class="menu-title">Jabatan & Anggota</li>
                <!-- /.menu-title -->
                <li class="{{Request()->segment(1) == 'position' ? 'active' : ''}}">
                    <a href="/position"> <i class="menu-icon ti-shine"></i>Jabatan</a>
                </li>
                <li class="{{Request()->segment(1) == 'concentration' ? 'active' : ''}}">
                    <a href="/concentration"> <i class="menu-icon ti-shield"></i>Konsentrasi</a>
                </li>


                <li class="menu-title">Manajemen</li>
                <!-- /.menu-title -->
                <li class="{{Request::segment(1) == 'user' ? 'active' : ''}}">
                    <a href="/user"> <i class="menu-icon ti-user"></i>Anggota</a>
                </li>
                <li class="{{Request::segment(1) == 'treasurer' ? 'active' : ''}}">
                    <a href="/treasurer"> <i class="menu-icon ti-heart"></i>Bendahara</a>
                </li>
                <li class="{{Request::segment(1) == 'admin' ? 'active' : ''}}">
                    <a href="/admin"> <i class="menu-icon ti-crown"></i>Admin</a>
                </li>

                <li class="menu-title">Artikel</li>

                <!-- /.menu-title -->
                <li class=" {{Request()->is('article') ? 'active' : ''}}">
                    <a href="/article"> <i class="menu-icon ti-book"></i>Semua Artikel</a>
                </li>
                <li class=" {{Request()->is('article/create') ? 'active' : ''}}">
                    <a href="/article/create"> <i class="menu-icon ti-pencil-alt"></i>Tambah Artikel</a>
                </li>

                <li class="menu-title">Karya</li>
                <!-- /.menu-title -->
                <li class=" {{Request()->is('creation') ? 'active' : ''}} ">
                    <a href="/creation"><i class="menu-icon ti-shine"></i>Semua Karya</a>
                </li>
                <li class=" {{Request()->is('creation/create') ? 'active' : ''}} ">
                    <a href="/creation/create"> <i class="menu-icon ti-control-play"></i>Tambah Karya</a>
                </li>


                <li class="menu-title">Inventaris</li>
                <!-- /.menu-title -->
                <li class="{{Request::segment(1) == 'inventory' ? 'active' : ''}}">
                    <a href="/inventory"> <i class="menu-icon ti-comments"></i>Data Inventaris</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->