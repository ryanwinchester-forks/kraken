<?php namespace SevenShores\Kraken\Services;

use SevenShores\Kraken\Contact;

class ContactCreator
{

//        // Example relations array
//        $relations = [
//            'sync' => [
//                'tags' => [1, 4, 5],
//                'forms' => [3, 4],
//            ],
//            'detach' => [
//                'forms' => [2]
//            ],
//            'attach' => [
//                'properties' => [1,3,4,5,8]
//            ]
//        ];

    public function create($email, array $relations = [])
    {
        $contact = Contact::create([
            'email' => $this->email,
        ]);

        if (isset($relation['attach'])) {
            foreach ($relations['attach'] as $relation => $ids) {
                $contact->$relation()->sync($ids, false);
            }
        }

        if (isset($relation['detach'])) {
            foreach ($relations['detach'] as $relation => $ids) {
                $contact->$relation()->detach($ids);
            }
        }

        if (isset($relation['sync'])) {
            foreach ($relations['sync'] as $relation => $ids) {
                $contact->$relation()->sync($ids);
            }
        }

        return $contact;
    }
}