<?php namespace Dyentite\Etsy\Facades;

use Illuminate\Support\Facades\Facade;

class Etsy extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'etsy'; }
}