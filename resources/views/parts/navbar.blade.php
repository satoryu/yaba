<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menus" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">YABA</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menus">
            <ul class="nav navbar-nav navbar-left">
                <li></li>
            </ul>

            @if (Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form" method="GET" action="{{ route('entries.create') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Write new entry
                            </button>
                        </form>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <img class="img-rounded" width="32px" src="{{ Auth::user()->accounts->first()->avatar_url }}" alt="">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('login') }}"><i class="fab fa-github"></i> Login</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>