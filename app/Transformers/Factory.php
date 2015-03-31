<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

class Factory
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var TransformerAbstract
     */
    private $transformer;

    /**
     * @var \Illuminate\Support\Collection|\SevenShores\Kraken\Core\Model
     */
    private $resource;

    /**
     * @param Manager $fractal
     * @param TransformerAbstract $transformer
     * @param mixed $resource
     */
    public function __construct(Manager $fractal, TransformerAbstract $transformer, $resource)
    {
        $this->fractal = $fractal;
        $this->transformer = $transformer;

        if ($resource instanceof \Illuminate\Support\Collection) {
            $this->resource = new Collection($resource, $this->transformer);
        } else {
            $this->resource = new Item($resource, $this->transformer);
        }
    }

    /**
     * @param string $transformer
     * @param \Illuminate\Support\Collection|\SevenShores\Kraken\Core\Model $resource
     * @return mixed
     */
    public static function make($transformer, $resource)
    {
        $manager = app(Manager::class);
        $transformer = app($transformer);

        return app(static::class, [$manager, $transformer, $resource]);
    }

    /**
     * Perform the transformation.
     *
     * @param null $includes
     * @return string
     */
    public function toJson($includes = null)
    {
        if (! is_null($includes)) {
            $this->fractal->parseIncludes($includes);
        }

        return $this->fractal->createData($this->resource)->toJson();
    }
}