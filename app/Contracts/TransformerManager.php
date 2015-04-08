<?php namespace SevenShores\Kraken\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
     * @return array
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
     * @return array
     */
    public function cursorCollection($data, $transformer = null, $cursor = null, $resourceKey = null);
}
