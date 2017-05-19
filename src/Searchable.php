<?php

namespace Algolia\AdvancedScout;

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
}
