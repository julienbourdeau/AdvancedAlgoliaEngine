<?php

namespace Algolia\AdvancedScout;


use Laravel\Scout\Builder as ScoutBuilder;

class Builder extends ScoutBuilder
{
    /**
     * Return the raw result from the engine.
     *
     * @return mixed
     */
    public function raw()
    {
        return $this->engine()->search($this);
    }
}
