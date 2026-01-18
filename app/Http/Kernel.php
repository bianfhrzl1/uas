<?php

namespace App\Http;

abstract class Kernel
{
protected $middlewareAliases = [
    'admin' => \App\Http\Middleware\AdminAuth::class,
];


}
    