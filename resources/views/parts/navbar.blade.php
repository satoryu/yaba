<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menus" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">YABA</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menus">
            <ul class="nav navbar-nav navbar-left">
                <li></li>
            </ul>

            <form class="navbar-form navbar-right" method="GET" action="{{ route('new_entry') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-pencil"></i> Write new entry
                </button>
            </form>
        </div>
    </div>
</nav>