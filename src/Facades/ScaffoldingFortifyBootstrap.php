<?php

namespace DavideCariola\ScaffoldingFortifyBootstrap\Facades;

use Illuminate\Support\Facades\Facade;

class ScaffoldingFortifyBootstrap extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ScaffoldingFortifyBootstrap';
    }
}
