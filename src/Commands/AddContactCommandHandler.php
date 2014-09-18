<?php namespace Kraken\Commands;

use Kraken\Contracts\Contact;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\EventDispatcher;

class AddContactCommandHandler implements CommandHandler {

    /**
     * @var ContactRepository
     */
    protected $contact;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * @param Contact $contact
     * @param EventDispatcher   $dispatcher
     */
    function __construct(Contact $contact, EventDispatcher $dispatcher)
    {
        $this->contact = $contact;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param $command
     * @return Contact
     */
    public function handle($command)
    {
        $contact = $this->contact->add($command->input);

        $this->dispatcher->dispatch($contact->releaseEvents());

        return $contact;
    }

} 