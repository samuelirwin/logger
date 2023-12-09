<?php

namespace Samuelirwin\Logger;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Samuelirwin\Logger\Skeleton\SkeletonClass
 */
class LoggerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'logger';
    }
}
