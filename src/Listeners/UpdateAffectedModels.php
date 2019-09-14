<?php


namespace MortenScheel\AutomaticModelDocblocks\Listeners;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use MortenScheel\AutomaticModelDocblocks\Facades\MigrationQueryRecorder;
use Symfony\Component\Console\Output\StreamOutput;

class UpdateAffectedModels
{
    /**
     * Enable query recording
     *
     * @return void
     */
    public function handle()
    {
        if (MigrationQueryRecorder::isRecording()) {
            MigrationQueryRecorder::setRecording(false);
            $affectedModels = MigrationQueryRecorder::getAffectedModels();
            if ($affectedModels->isNotEmpty()) {
                $output = new StreamOutput(STDOUT);
                $params = array_merge(Config::get('automatic-model-docblocks.options'), [
                    'model' => $affectedModels->toArray(),
                ]);
                Artisan::call('ide-helper:models', $params, $output);
            }
        }
    }
}
