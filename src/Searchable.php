<?php

namespace Algolia\AdvancedScout;

use Laravel\Scout\EngineManager;
use Laravel\Scout\Searchable as ScoutSearchable;

trait Searchable
{
    use ScoutSearchable {
        search as scoutSearch;
    }

    public static function search($query, $callback = null)
    {
        return new Builder(new static, $query, $callback);
    }

    /**
     * Get the Scout engine for the model.
     *
     * @return mixed
     */
    public function searchableUsing()
    {
        return app(EngineManager::class)->engine('advancedAlgolia');
    }
}
