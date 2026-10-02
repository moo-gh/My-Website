<?php

namespace App\Http\Middleware;

use Closure;

class StripTrackingQueryParameters
{
    /**
     * Query keys appended by social / ad platforms (not used by this site).
     *
     * @var array
     */
    protected $trackingKeys = [
        'fbclid',
        'gclid',
        'gclsrc',
        'msclkid',
        'mc_cid',
        'mc_eid',
        'igshid',
        'ref',
        'li_fat_id',
        'twclid',
        'mkt_tok',
        '_hsenc',
        '_hsmi',
    ];

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->isMethod('GET') && !$request->isMethod('HEAD')) {
            return $next($request);
        }

        $query = $request->query();
        if (empty($query)) {
            return $next($request);
        }

        $hasTracking = false;
        $cleanQuery = [];

        foreach ($query as $key => $value) {
            if ($this->isTrackingParameter($key)) {
                $hasTracking = true;
                continue;
            }
            $cleanQuery[$key] = $value;
        }

        if (!$hasTracking) {
            return $next($request);
        }

        $target = $request->url();
        if (!empty($cleanQuery)) {
            $target .= '?' . http_build_query($cleanQuery);
        }

        return redirect()->to($target, 302);
    }

    /**
     * @param  string  $key
     * @return bool
     */
    protected function isTrackingParameter($key)
    {
        $key = strtolower($key);

        if (strpos($key, 'utm_') === 0) {
            return true;
        }

        return in_array($key, $this->trackingKeys, true);
    }
}
