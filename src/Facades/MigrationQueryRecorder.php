<?php

namespace MortenScheel\AutomaticModelDocblocks\Facades;

use Illuminate\Support\Facades\Facade;

class MigrationQueryRecorder extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'migration-query-recorder';
    }
}
