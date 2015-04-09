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
     * @param int $cursor
     * @param array $options
     * @return mixed
     */
    public function cursor($cursor = 0, $options = [])
    {
        $options['count'] = isset($options['count']) ? (int) $options['count'] : 20;

        if ($options['count'] > 100) {
            $options['count'] = 100;
        }

        return $this->make()
            ->where('id', '>', (int) $cursor)
            ->take($options['count'])
            ->get();
    }
}
