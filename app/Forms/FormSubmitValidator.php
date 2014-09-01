<?php namespace Kraken\Contacts\Forms;

    use Kraken\Contacts\Forms\FormRepository;
    use Kraken\Core\Eventing\EventDispatcher;

class FormSubmitValidator {

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
     * Validate the command
     *
     * @param  $command
     * @return mixed
     */
    public function validate($command)
    {
        $form = $this->form->submit($command->input);

        $this->dispatcher->dispatch($form->releaseEvents());
    }

}
