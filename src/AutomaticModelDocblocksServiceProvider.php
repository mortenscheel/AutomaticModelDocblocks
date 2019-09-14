<?php

namespace MortenScheel\AutomaticModelDocblocks;

use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Database\Events\MigrationsStarted;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use MortenScheel\AutomaticModelDocblocks\Facades\MigrationQueryRecorder as Recorder;
use MortenScheel\AutomaticModelDocblocks\Listeners\RecordMigrationQueries;
use MortenScheel\AutomaticModelDocblocks\Listeners\UpdateAffectedModels;

class AutomaticModelDocblocksServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/automatic-model-docblocks.php' => config_path('automatic-model-docblocks.php'),
            ], 'automatic-model-docblocks');
            if (Config::get('automatic-model-docblocks.enabled', false) &&
                version_compare($this->app->version(), '5.8.16')) {
                DB::listen(function (QueryExecuted $query) {
                    if (Recorder::isRecording()) {
                        Recorder::recordQuery($query->sql);
                    }
                });
                Event::listen(MigrationsStarted::class, RecordMigrationQueries::class);
                Event::listen(MigrationsEnded::class, UpdateAffectedModels::class);
            }
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/automatic-model-docblocks.php', 'automatic-model-docblocks');
        $this->app->singleton('migration-query-recorder', function () {
            return new MigrationQueryRecorder;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['migration-query-recorder'];
    }
}
