<?php namespace Kraken\Commands;

use Kraken\Entities\Forms\FormRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class FormSubmitCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * @var FormRepository
     */
    protected $form;

    function __construct(FormRepository $form)
    {
        $this->form = $form;
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
