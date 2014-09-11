<?php namespace Kraken\Entities\Contacts;

use Kraken\Entities\BaseRepository;
use Laracasts\Commander\Events\EventGenerator;

class EloquentContactRepository extends BaseRepository implements ContactRepository {

    use EventGenerator;

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
     * Find a contact by ID or email
     *
     * @param  int $id    Contact id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        // If it is numeric assume that it is the id
        if (is_numeric($id))
        {
            return $this->contact->with('fields')->find($id);
        }

        // Otherwise, assume that it is the email
        return $this->contact->where('email', $id)->with('fields')->first();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return $this->contact->where('email', $email)->first();
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
     * @param  array $input
     * @return Contact
     */
    public function add(array $input)
    {
        $input['ip'] = isset($input['_ip']) ? ip2long( $input['_ip'] ) : null;
        $input['token'] = md5($input['email']);

        $contact = $this->contact->create($input);

        $this->raise(new ContactWasCreated($contact));

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
