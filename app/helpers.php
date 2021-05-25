<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('user')) {
    /**
     * Format the given number as money in US dollars.
     *
     * @return \App\Models\User|\Illuminate\Auth\Authenticatable
     */
    function user()
    {
        return Auth::user();
    }
}
