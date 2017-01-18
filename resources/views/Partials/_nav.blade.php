<nav class="navbar navbar-default">
    <div class="container-fluid col-sm-10 col-sm-offset-1">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                <span class="glyphicon glyphicon-menu-hamburger"></span>
            </button>
            <a class="navbar-brand" href="/">Music Tracker</a>
        </div>
        <div class="collapse navbar-collapse" id="topNavBar">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="/leaked">Leaked</a>
                </li>
                <li class="">
                    <a href="/coming">Upcoming</a>
                </li>
                @if(!Auth::guest())
                <li class="">
                    <a href="/album">Albums</a>
                </li>
                @endif
                <li class="">
                    <a href="/itunes">Itunes</a>
                </li>
            </ul>

            {{--this will be a search button in the navigation--}}
            {{--<form class="navbar-form navbar-left" role="search" method="get" action="#">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" name="q" value="">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-link glyphicon glyphicon-search"></button>--}}
            {{--</form>--}}

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::user()->isAdmin())
                            <li><a href="{{ route('admin.albums') }}">Admin Page</a></li>
                        @else
                        <li><a href="{{ route('collection.index') }}">My Albums</a></li>
                        @endif
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>
                @endif
            </ul>

            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li class=""><a href="">Register</a></li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in" ></span>&nbspLogin</a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">Another action</a></li>--}}
                    {{--<li><a href="#">Something else here</a></li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    {{--<li><a href="#">Separated link</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </div>
    </div>
</nav>