<?php

if (! function_exists('local_url')) {
    /**
     * Converts the given URL into a local URL.
     *
     * @param  string   $url
     * @param  boolean  $removeSsl
     * @return string
     */
    function local_url($url, $removeSsl = false)
    {
        $tlds = [
            '.com', '.co.uk',
        ];

        if ($removeSsl) {
            $url = str_replace('https', 'http', $url);
        }

        foreach ($tlds as $tld) {
            $url = str_replace($tld, '.local', $url);
        }

        return $url;
    }
}
