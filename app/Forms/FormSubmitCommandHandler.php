<?php namespace Kraken\Contacts\Forms;

use Kraken\Core\Commanding\CommandHandler;
use Kraken\Contacts\Forms\FormRepository;
use Kraken\Core\Eventing\EventDispatcher;

class FormSubmitCommandHandler implements CommandHandler {

    /**
     * @var FormRepository
     */
    protected $form;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    function __construct(FormRepository $form, EventDispatcher $dispatcher)
    {
        $this->form = $form;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Handle the command
     *
     * @param  $command
     * @return mixed
     */
    public function handle($command)
    {
        $form = $this->form->submit($command->input);

        $this->dispatcher->dispatch($form->releaseEvents());
    }

}
