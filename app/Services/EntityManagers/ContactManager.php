<?php namespace SevenShores\Kraken\Services\EntityManagers;

use SevenShores\Kraken\Contact;

class ContactManager
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

    /**
     * @param Contact $contact
     * @param array $relations
     * @return mixed
     */
    private function handleRelations(Contact $contact, array $relations)
    {
        if (isset($relations['attach'])) {
            foreach ($relations['attach'] as $relation => $ids) {
                $contact->attach($relation, $ids);
            }
        }

        if (isset($relations['detach'])) {
            foreach ($relations['detach'] as $relation => $ids) {
                $contact->detach($relation, $ids);
            }
        }

        if (isset($relations['sync'])) {
            foreach ($relations['sync'] as $relation => $ids) {
                $contact->sync($relation, $ids);
            }
        }

        return $contact;
    }
}