<?php namespace Kraken\Commands;

use Kraken\Contracts\Form;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\EventDispatcher;

class SubmitFormCommandHandler implements CommandHandler {

    /**
     * @var Form
     */
    protected $form;

    /**
     * @var EventDispatcher
     */
    private $dispatcher;

    /**
     * @param Form $form
     * @param EventDispatcher $dispatcher
     */
    function __construct(Form $form, EventDispatcher $dispatcher)
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

        return $form;
    }

}
