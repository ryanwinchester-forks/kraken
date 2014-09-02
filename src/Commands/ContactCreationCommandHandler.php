<?php namespace Kraken\Contacts;

use Kraken\Core\Commanding\CommandHandler;
use Kraken\Core\Eventing\EventDispatcher;

class ContactCreationCommandHandler implements CommandHandler {

    /**
     * @var ContactRepository
     */
    protected $contact;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * @param ContactRepository $contact
     * @param EventDispatcher   $dispatcher
     */
    function __construct(ContactRepository $contact, EventDispatcher $dispatcher)
    {
        $this->contact = $contact;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param $command
     * @return Response
     */
    public function handle($command)
    {
        $input = $command->input;

        $contact = $this->contact->add($input);

        $this->dispatcher->dispatch($contact->releaseEvents());
    }

} 