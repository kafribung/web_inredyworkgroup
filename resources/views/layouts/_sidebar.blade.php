  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{Request::segment(1) == 'dashboard' ? 'active' : ''}}">
                    <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Manajemen</li>
                <!-- /.menu-title -->
                <li class="{{Request::segment(1) == 'user' ? 'active' : ''}}">
                    <a href="/user"> <i class="menu-icon ti-user"></i>User</a>
                </li>
                <li class="{{Request::segment(1) == 'ustad' ? 'active' : ''}}">
                    <a href="/ustad"> <i class="menu-icon ti-heart"></i>Ustad</a>
                </li>
                <li class="{{Request::segment(1) == 'admin' ? 'active' : ''}}">
                    <a href="/admin"> <i class="menu-icon ti-crown"></i>Admin</a>
                </li>

                <li class="menu-title">Artikel</li>

                <!-- /.menu-title -->
                <li class=" {{Request()->segment(1) == 'kategori-artikel' ? 'active' : ''}} ">
                    <a href="/kategori-artikel"> <i class="menu-icon ti-infinite"></i>Kategori Artikel</a>
                </li>
                <li class=" {{Request()->is('artikel') ? 'active' : ''}}">
                    <a href="/artikel"> <i class="menu-icon ti-book"></i>Semua Artikel</a>
                </li>
                <li class=" {{Request()->is('artikel/create') ? 'active' : ''}}">
                    <a href="/artikel/create"> <i class="menu-icon ti-pencil-alt"></i>Tambah Artikel</a>
                </li>

                <li class="menu-title">Video</li>

                <!-- /.menu-title -->
                <li class=" {{Request()->segment(1) == 'kategori-video' ? 'active' : ''}} ">
                    <a href="/kategori-video"> <i class="menu-icon ti-infinite"></i>Kategori Video</a>
                </li>
                <li class=" {{Request()->is('video') ? 'active' : ''}} ">
                    <a href="/video"> <i class="menu-icon ti-video-clapper"></i>Semua Video</a>
                </li>
                <li class=" {{Request()->is('video/create') ? 'active' : ''}} ">
                    <a href="/video/create"> <i class="menu-icon ti-control-play"></i>Tambah Video</a>
                </li>

                <li class="menu-title">Doa & Hadist</li>
                <!-- /.menu-title -->

                <li class="{{Request()->is('doa-hadist') ? 'active' : ''}}">
                    <a href="/doa-hadist"> <i class="menu-icon ti-image"></i>Semua Doa & Hadist</a>
                </li>
                <li class="{{Request()->is('doa-hadist/create') ? 'active' : ''}}">
                    <a href="/doa-hadist/create"> <i class="menu-icon ti-plus"></i>Tambah Doa & Hadist</a>
                </li>

                <li class="menu-title">Komentar</li>
                <!-- /.menu-title -->

                <li>
                    <a href="#"> <i class="menu-icon ti-comments"></i>Lihat Komentar</a>
                </li>

                <li class="menu-title">Pertanyaan</li>
                <!-- /.menu-title -->

                <li>
                    <a href="#"> <i class="menu-icon ti-comment-alt"></i>Lihat Pertanyaan</a>
                </li>

                <li class="menu-title">Informasi</li>
                <!-- /.menu-title -->
                <li>
                    <a href="#"> <i class="menu-icon ti-gift"></i>Iklan</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon ti-shield"></i>Hadis Harian</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon ti-shine"></i>Akan Datang</a>
                </li>

                <li class="menu-title">Tentang</li>
                <!-- /.menu-title -->

                <li>
                    <a href="#"> <i class="menu-icon ti-facebook"></i>Media Sosial</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon ti-medall"></i>Profil</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->