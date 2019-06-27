<?php

namespace anek77713\LaravelUser\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelUser extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraveluser';
    }
}
