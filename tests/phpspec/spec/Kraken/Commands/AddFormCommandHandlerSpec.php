<?php

namespace spec\Kraken\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Laracasts\Commander\Events\EventDispatcher;
use Kraken\Repositories\EloquentFormRepository as Form;

class AddFormCommandHandlerSpec extends ObjectBehavior
{
    function let(Form $form, EventDispatcher $dispatcher)
    {
        $this->beConstructedWith($form, $dispatcher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kraken\Commands\AddFormCommandHandler');
    }

    function it_adds_a_form(EventDispatcher $dispatcher, Form $form, AddFormCommandStub $command, FormStub $formstub)
    {
        $form->add([
            'name' => "Test Name",
            'slug' => "test-name",
            'description' => "description"
        ])->shouldBeCalled()->willReturn($formstub);

        $formstub->releaseEvents()->willReturn(array());

        $dispatcher->dispatch([])->shouldBeCalled();

        $this->handle($command)->shouldReturn($formstub);
    }
}


class FormStub { function releaseEvents() {} }
class AddFormCommandStub {
    public $name = "Test Name";
    public $slug = "test-name";
    public $description = "description";
}
