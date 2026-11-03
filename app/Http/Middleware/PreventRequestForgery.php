<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestForgery as Middleware;

class PreventRequestForgery extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF / request forgery verification.
     *
     * @var array
     */
    protected $except = [
        '/comments/bot.php',
        '/foodBot/bot.php',
    ];
}
