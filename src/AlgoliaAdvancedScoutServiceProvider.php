<?php

namespace Algolia\AdvancedScout;


use Algolia\AdvancedScout\Engines\AlgoliaEngine;
use Illuminate\Support\ServiceProvider;
use AlgoliaSearch\Client as Algolia;
use Laravel\Scout\EngineManager;

class AlgoliaAdvancedScoutServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app[EngineManager::class]->extend('advancedAlgolia', function () {
            return new AlgoliaEngine(new Algolia(
                config('scout.algolia.id'), config('scout.algolia.secret')
            ));
        });
    }
}
