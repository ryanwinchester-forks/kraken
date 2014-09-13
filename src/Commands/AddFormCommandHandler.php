<?php namespace Kraken\Commands;

use Kraken\Contracts\Form;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddFormCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * @var Form
     */
    protected $form;

    /**
     * @param Form $form
     */
    function __construct(Form $form)
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
        $form = $this->form->add([
            'name'        => $command->name,
            'slug'        => $command->slug,
            'description' => $command->description
        ]);

        $this->dispatchEventsFor($form);

        return $form;
    }

}
