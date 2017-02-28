@include('partials.header')
<div class="sidebar">
    <div class="logopanel">
        <h1>
            <a href="../dashboard.html"></a>
        </h1>
    </div>
</div>
<section>    
    <div class="main-content">
        <div class="row">
            <div class="col-md-12 intro">
                @if (Session::has('message'))
                <div class="note note-info">
                    <p>{{ Session::get('message') }}</p>
                </div>
                @endif
            </div>
        </div>
        <div class="topbar">
            <div class="header-left">
                <div class="topnav">
                    <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                    <ul class="nav nav-icons">
                        <li><a href="#" class="toggle-sidebar-top"><span class="icon-user-following"></span></a></li>
                        <li><a href="../mailbox.html"><span class="octicon octicon-mail-read"></span></a></li>
                        <li><a href="#"><span class="octicon octicon-flame"></span></a></li>
                        <li><a href="index.html"><span class="octicon octicon-rocket"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="header-right"></div>
        </div>
        @yield('content')
    </div>
</section>
@include('partials.footer')


