<?php namespace Kraken\Commands;

use Kraken\Contracts\Contact;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddContactCommandHandler extends BaseCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * @var ContactRepository
     */
    protected $contact;

    /**
     * @var CommandResponse
     */
    private $response;

    /**
     * @param Contact $contact
     */
    function __construct(Contact $contact, CommandResponse $response)
    {
        $this->contact = $contact;
        $this->response = $response;
    }

    /**
     * @param $command
     * @return Contact
     */
    public function handle($command)
    {
        $contact = $this->contact->add($command->input);

        $this->dispatchEventsFor($contact);

        return $this->response->success($contact->email .' added.');
    }

} 