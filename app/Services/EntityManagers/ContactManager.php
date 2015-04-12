<?php namespace SevenShores\Kraken\Services\EntityManagers;

use SevenShores\Kraken\Contact;

class ContactManager extends EntityManager
{
    /**
     * @param string $email
     * @param array $relations
     * @return mixed
     */
    public function create($email, array $relations = [])
    {
        $contact = Contact::create([
            'email' => $email,
        ]);

        if (! empty($relations)) {
            foreach ($relations as $relation => $ids) {
                $contact->attach($relation, $ids);
            }
        }

        $contact->save();

        return $contact;
    }

    /**
     * @param int $contact_id
     * @param null $email
     * @param array $relations
     * @return mixed
     */
    public function update($contact_id, $email = null, array $relations = [])
    {
        $contact = Contact::findOrFail($contact_id);

        if (! is_null($email)) {
            $contact->update([
                'email' => $email,
            ]);
        }

        if (! empty($relations)) {
            $contact = $this->handleRelations($contact, $relations);
        }

        $contact->save();

        return $contact;
    }
}