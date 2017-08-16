@include('partials.header')
<div class="sidebar">
    <div class="logopanel">
        <h1>
            <a href="{{ URL::to('/') }}"></a>
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
                    <ul class="header-menu nav navbar-nav">
                        <li><a href="{{ URL::to('/map') }}"><i class="octicon octicon-browser"></i> Map Viewer</a></li>
                        <li><a href="{{ URL::to('/html/templates') }}"><i class="octicon octicon-mail-read"></i> Email Builder</a></li>
                        <li><a href="{{ URL::to('/pdf/templates') }}"><i class="octicon octicon-browser"></i> PDF Builder</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-right"></div>
        </div>
        @yield('content')
    </div>
</section>
@include('partials.footer')


