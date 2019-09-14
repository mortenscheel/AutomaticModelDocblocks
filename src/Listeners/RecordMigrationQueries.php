<?php


namespace MortenScheel\AutomaticModelDocblocks\Listeners;

use MortenScheel\AutomaticModelDocblocks\Facades\MigrationQueryRecorder;

class RecordMigrationQueries
{
    /**
     * Enable query recording
     *
     * @return void
     */
    public function handle()
    {
        MigrationQueryRecorder::setRecording(true);
    }
}
