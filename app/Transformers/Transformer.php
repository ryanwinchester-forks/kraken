<?php namespace SevenShores\Kraken\Transformers;

use Illuminate\Support\Collection;
use League\Fractal\TransformerAbstract;
use SevenShores\Kraken\Core\Model;

abstract class Transformer extends TransformerAbstract
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param Collection $data
     * @param Transformer $transformer
     * @return \League\Fractal\Resource\Collection
     */
    protected function makeCollection(Collection $data, Transformer $transformer)
    {
        $key = str_plural($transformer->getKey());

        return $this->collection($data, $transformer, $key);
    }

    /**
     * @param Model $data
     * @param Transformer $transformer
     * @return \League\Fractal\Resource\Item
     */
    protected function makeItem(Model $data, Transformer $transformer)
    {
        $key = $transformer->getKey();

        return $this->item($data, $transformer, $key);
    }
}
