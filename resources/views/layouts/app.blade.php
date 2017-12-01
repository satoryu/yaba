<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">

        @if (env('INSTRUMENTATION_KEY'))
            <script src="/js/application-insights.js"></script>
            <script>
                appInsights.downloadAndSetup({ instrumentationKey: '{{ env('INSTRUMENTATION_KEY') }}' });
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
            @yield('content')
        </div>
    </body>
</html>