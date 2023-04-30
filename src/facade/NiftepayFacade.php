<?php

namespace niftepay\NiftePay\Facade;

use Illuminate\Support\Facades\Facade;

class NiftePayFacade extends Facade
{
    /**
     * Get the registered name of the component
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'niftepay';
    }
}
