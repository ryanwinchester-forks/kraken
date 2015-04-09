<?php  namespace SevenShores\Kraken\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use League\Fractal\Manager as Fractal;
use League\Fractal\Pagination\Cursor;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\SerializerAbstract;
use League\Fractal\TransformerAbstract;
use SevenShores\Kraken\Contracts\TransformerManager;

class FractalTransformerManager implements TransformerManager
{
    /**
     * @var \League\Fractal\Manager
     */
    protected $manager;

    /**
     * @param Fractal $manager
     * @param SerializerAbstract $serializer
     */
    public function __construct(Fractal $manager, SerializerAbstract $serializer)
    {
        $this->manager = $manager;

        $this->manager->setSerializer($serializer);
        $this->manager->parseIncludes(\Request::get('include', ''));
    }

    /**
     * @param string $includes
     */
    public function parseIncludes($includes)
    {
        $this->manager->parseIncludes($includes);
    }

    /**
     * @param $data
     * @param null $transformer
     * @param null $resourceKey
     * @return \League\Fractal\Scope
     */
    public function item($data, $transformer = null, $resourceKey = null)
    {
        $resource = new Item($data, $this->getTransformer($transformer), $resourceKey);

        return $this->manager->createData($resource);
    }

    /**
     * @param $data
     * @param null $transformer
     * @param null $resourceKey
     * @return \League\Fractal\Scope
     */
    public function collection($data, $transformer = null, $resourceKey = null)
    {
        $resource = new Collection($data, $this->getTransformer($transformer), $resourceKey);

        return $this->manager->createData($resource);
    }

    /**
     * @param $data
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param \League\Fractal\Pagination\Cursor|int $cursor
     * @param string $resourceKey
     * @return \League\Fractal\Scope
     */
    public function cursorCollection($data, $transformer = null, $cursor = null, $resourceKey = null)
    {
        $transformer = $this->getTransformer($transformer);

        $resource = new Collection($data, $transformer, $resourceKey);

        $resource->setCursor($this->makeCursor($cursor, $data));

        return $this->manager->createData($resource);
    }

    /**
     * @param TransformerAbstract $transformer
     * @return TransformerAbstract|callback
     */
    protected function getTransformer($transformer = null)
    {
        return $transformer ?: function ($data) {
            if ($data instanceof Arrayable) {
                return $data->toArray();
            }
            return (array) $data;
        };
    }

    /**
     * @param $cursor
     * @param $data
     * @return Cursor
     */
    protected function makeCursor($cursor, $data)
    {
        if ($cursor instanceof Cursor) {
            return $cursor;
        } elseif (is_array($cursor) && ! $data->isEmpty()) {
            $current = (int) ($data->first()->id - 1);
            $next    = (int)  $data->last()->id;
            $count   = (int)  $data->count();
            $prev    = ! empty($cursor['prev']) ? (int) $cursor['prev'] : null;

            return new Cursor($current, $prev, $next, $count);
        }

        return new Cursor();
    }
}
