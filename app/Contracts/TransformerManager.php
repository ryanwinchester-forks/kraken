<?php namespace SevenShores\Kraken\Contracts;

interface TransformerManager
{
    /**
     * @param string $includes
     */
    public function parseIncludes($includes);

    /**
     * @param $data
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param string $resourceKey
     * @return \League\Fractal\Scope
     */
    public function collection($data, $transformer = null, $resourceKey = null);

    /**
     * @param $data
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param string $resourceKey
     * @return array
     */
    public function item($data, $transformer = null, $resourceKey = null);

    /**
     * @param $data
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param int $cursor
     * @param string $resourceKey
     * @return \League\Fractal\Scope
     */
    public function cursorCollection($data, $transformer = null, $cursor = null, $resourceKey = null);
}
