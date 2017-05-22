<?php

namespace Algolia\AdvancedScout;


use Laravel\Scout\Builder as ScoutBuilder;

class Builder extends ScoutBuilder
{
    private $options = [];

    /**
     * Retrieve the number of matching results.
     *
     * @return int Number of results
     */
    public function count()
    {
        return (int) $this->engine()->count($this);
    }

    /**
     * Return the raw result from the engine.
     *
     * @return mixed
     */
    public function raw()
    {
        return $this->engine()->search($this);
    }

    public function around($lat, $lng, $radius = 1000)
    {
        $location = [
            'aroundLatLng' => $lat.','.$lng,
            'aroundRadius' => $radius
        ];

        return $this->addOptions($location);
    }

    public function addOptions($options)
    {
        $this->options = array_merge($this->options, $options);
        $this->mergeOptionsCallback();

        return $this;
    }

    private function mergeOptionsCallback()
    {
        $newOptions = $this->options;
        $callback = $this->callback;

        $this->callback = function ($algolia, $query, $options) use ($newOptions, $callback) {
            $options = array_merge($options, $newOptions);

            if ($callback) {
                return call_user_func(
                    $callback,
                    $algolia,
                    $query,
                    $options
                );
            }

            return $algolia->search($query, $options);
        };
    }
}
