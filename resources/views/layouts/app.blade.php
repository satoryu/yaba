<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">

        @if (env('INSTRUMENTATION_KEY'))
            <script src="/js/ai.js"></script>
            <script>
                var init = new Microsoft.ApplicationInsights.Initialization({
                    config: { instrumentationKey: '{{ env('INSTRUMENTATION_KEY') }}' }
                });
                var appInsights = init.loadAppInsights();
                appInsights.trackPageView();
            </script>
        @endif
        <script src="/js/app.js"></script>

        <title>
            @yield('title') - Laravel Blog
        </title>
    </head>
    <body>
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

            @yield('content')
        </div>
    </body>
</html>