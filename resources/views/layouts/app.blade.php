<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        @if (env('INSTRUMENTATION_KEY'))
            <script src="{{ mix('/js/ai.js') }}"></script>
            <script>
                var init = new Microsoft.ApplicationInsights.Initialization({
                    config: { instrumentationKey: '{{ env('INSTRUMENTATION_KEY') }}' }
                });
                var appInsights = init.loadAppInsights();
                appInsights.trackPageView();
            </script>
        @endif
        <script src="{{ mix('/js/app.js') }}"></script>

        <title>
            @yield('title') - Laravel Blog
        </title>
    </head>
    <body>
        @include('parts.navbar')

        <div class="container">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    {{ $error }}
                    </div>
                @endforeach
            @endif

            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="cols-md-8">
                    @yield('sidebar')
                </div>
            </div>
        </div>
    </body>
</html>