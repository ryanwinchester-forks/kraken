<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Contracts\Repositories\ContactRepository;
use SevenShores\Kraken\Transformers\ContactTransformer;

class EloquentContactRepository extends EloquentRepository implements ContactRepository
{
    /**
     * @var string
     */
    protected $model = Contact::class;

    /**
     * @param string $cursor
     * @param array $options
     * @return mixed
     */
    public function cursor($cursor = ContactTransformer::DEFAULT_CURSOR, $options = [])
    {
        $options['count'] = isset($options['count']) ? $options['count'] : 20;

        $query = $this->make()
            ->where('id', '>', base64_decode($cursor))
            ->take($options['count']);

        if (isset($options['order'])) {
            $query = $this->addOrderToQuery($options['order'], $query);
        }

        return $query->get();
    }

    /**
     * @param array|string $order
     * @param $query
     * @return mixed
     */
    private function addOrderToQuery($order, $query)
    {
        if (! is_array($order)) {
            return $query->orderBy($order);
        }

        if (isset($order['direction'])) {
            return $query->orderBy($order['column'], $order['direction']);
        }

        return $query->orderBy($order['column']);
    }
}
