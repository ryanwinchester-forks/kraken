<?php namespace Kraken\Commands;

use Kraken\Contracts\Form;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\EventDispatcher;

class AddFormCommandHandler implements CommandHandler {

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
        $form = $this->form->add([
            'name'        => $command->name,
            'slug'        => $command->slug,
            'description' => $command->description
        ]);

        $this->dispatcher->dispatch($form->releaseEvents());

        return $form;
    }

}
