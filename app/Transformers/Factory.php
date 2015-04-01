<?php namespace SevenShores\Kraken\Transformers;

use Illuminate\Contracts\Pagination\Paginator;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\TransformerAbstract;
use SevenShores\Kraken\Contracts\TransformerManager;

class Factory
{
    /**
     * @var TransformerManager
     */
    private $manager;

    /**
     * @var TransformerAbstract
     */
    private $transformer;

    /**
     * @var \Illuminate\Support\Collection|\SevenShores\Kraken\Core\Model
     */
    private $resource;

    /**
     * @param TransformerManager $manager
     * @param TransformerAbstract $transformer
     * @param mixed $resource
     */
    public function __construct(TransformerManager $manager, TransformerAbstract $transformer, $resource)
    {
        $this->manager = $manager;
        $this->transformer = $transformer;
        $this->resource = $resource;
    }

    /**
     * @param string $transformer
     * @param \Illuminate\Support\Collection|\SevenShores\Kraken\Core\Model $resource
     * @return mixed
     */
    public static function make($transformer, $resource)
    {
        $manager = app(TransformerManager::class);
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
        // Don't really want side-loaded data
        // But I like having custom keys instead of "data"...
        // TODO: Make a custom serializer?
        // $this->manager->setSerializer(new JsonApiSerializer());

        $key = $this->transformer->getKey();

        if ($this->resource instanceof \Illuminate\Support\Collection) {
            return $this->manager->collection($this->resource, $this->transformer, str_plural($key));
        } elseif ($this->resource instanceof Paginator) {
            return $this->manager->paginatedCollection($this->resource, $this->transformer, str_plural($key));
        }

        return $this->manager->item($this->resource, $this->transformer, $key);
    }
}