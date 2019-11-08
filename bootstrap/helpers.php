<?php

use Illuminate\Support\Arr;

if (! function_exists('local_url')) {
    /**
     * Converts the given URL into a local URL.
     * Example: https://blog.bavanco.co.uk >> http://blog.bavanco.local:8003
     * Example: https://sites.adrianbavister.com/api/meta >> http://sites.adrianbavister.local:8102/api/meta
     *
     * @param  string   $url
     * @param  boolean  $removeSsl
     * @return string
     */
    function local_url($url, $removeSsl = true)
    {
        if ($removeSsl) {
            $url = str_replace('https', 'http', $url);
        }

        $tlds = config('tlds');

        $urlHost = parse_url($url, PHP_URL_HOST);
        $subdomain = Arr::first(explode('.', $urlHost));

        if (isset($tlds[$subdomain])) {
            $url = str_replace($tlds[$subdomain]['prod'], $tlds[$subdomain]['local'], $url);
        }

        return $url;
    }
}
