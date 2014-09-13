<?php namespace Kraken\Entities;

use Kraken\Contracts\Contact as ContactInterface;
use Kraken\Models\Contact;

class EloquentContactRepository extends BaseRepository implements ContactInterface {

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var string
     */
    protected $type = 'contact';

    /**
     * Constructor
     *
     * @param Contact $contact [description]
     */
    public function __construct(Contact $contact)
    {
        parent::_construct('contact');

        $this->contact = $contact;
    }

    /**
     * Get all Contacts
     *
     * @return Illuminate\Database\Eloquent\Collection Eloquent Collection
     */
    public function all()
    {
        return $this->contact->with('fields')->get();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return $this->contact->with('fields')->where('email', $email)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id, array $with = null)
    {
        return $this->contact->with('fields')->find($id);
    }

    /**
     * Create a new Contact
     *
     * @param  array $input
     * @return Contact
     */
    public function create(array $input)
    {
        return $this->contact->create($input);
    }

    /**
     * Create a new Contact
     *
     * @param  array $contactData
     * @return Contact
     */
    public function add(array $contactData)
    {
        $contactData['ip'] = isset($contactData['_ip']) ? ip2long( $contactData['_ip'] ) : null;
        $contactData['token'] = md5($contactData['email']);

        $contact = $this->contact->create($contactData);

        $contact->raise(new ContactWasCreated($contact));

        return $this;
    }

    /**
     * Update a Contact
     *
     * @param  array $input
     * @return Contact
     */
    public function update(array $input)
    {
        return $this->contact->update($input);
    }

    /**
     * Save the Contact to the database
     *
     * @return Contact
     */
    public function save()
    {
        return $this->contact->save();
    }

    /**
     * Adds a field to a contact.
     *
     * @param string $name  Name of the field.
     * @param string $value The value to assign to the field.
     * @return Contact
     */
    public function addField($name, $value)
    {
        return $this->contact->addField($name, $value);
    }

    /**
     * Adds an array of fields to a contact.
     *
     * @param string $fields  Name of the field.
     * @return Contact
     */
    public function addFields($fields)
    {
        return $this->contact->addFields($fields);
    }

    /**
     * Removes a field from a contact.
     *
     * @param  string $field Name of the field.
     * @return Contact
     */
    public function deleteField($field)
    {
        return $this->contact->deleteField($field);
    }

}
