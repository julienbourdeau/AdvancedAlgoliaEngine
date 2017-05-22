<?php

namespace Algolia\AdvancedScout\Engines;


use Laravel\Scout\Builder;
use Laravel\Scout\Engines\AlgoliaEngine as ScoutAlgoliaEngine;

class AlgoliaEngine extends ScoutAlgoliaEngine
{
    /**
     * Retrieve number of search results from the the engine
     *
     * @param \Laravel\Scout\Builder $builder
     * @return mixed Number of results
     */
    public function count(Builder $builder)
    {
        $results =  $this->performSearch($builder, [
            'responseFields' => ['nbHits'],
        ]);

        return $results['nbHits'];
    }
}
