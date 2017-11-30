<?php

namespace App\Http\Middleware;

use Closure;
use \ApplicationInsights\Telemetry_Client;

class TrackRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $instrumentation_key = env('INSTRUMENTATION_KEY');
        if (!is_null($instrumentation_key)) {
            $client = new Telemetry_Client();
            $client->getContext()->setInstrumentationKey($instrumentation_key);

            $start = time();
            $response = $next($request);

            try {
                $duration = (time() - $start) * 1000;
                $name = $request->method() . ' ' . $request->route()->uri;
                $client->trackRequest($name, $request->url(), $start, $duration, $response->status());
                $client->flush();
            } catch(Exception $error) {
                \Log::warning($error->getMessage());
            }

            return $response;
        } else {
            return $next($request);
        }
    }
}
