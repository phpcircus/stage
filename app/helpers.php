<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('user')) {
    /**
     * Format the given number as money in US dollars.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user()
    {
        return Auth::user();
    }
}
