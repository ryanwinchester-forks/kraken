<?php

namespace spec\Kraken\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Laracasts\Commander\Events\EventDispatcher;
use Kraken\Repositories\EloquentFormRepository as Form;

class SubmitFormCommandHandlerSpec extends ObjectBehavior
{
    function let(Form $form, EventDispatcher $dispatcher)
    {
        $this->beConstructedWith($form, $dispatcher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kraken\Commands\SubmitFormCommandHandler');
    }

    function it_submits_a_form(EventDispatcher $dispatcher, Form $form, SubmitFormCommandStub $command, FormStub $formstub)
    {
        $form->submit([
            'name' => "Test Name",
            'slug' => "test-name",
            'description' => "description"
        ])->shouldBeCalled()->willReturn($formstub);

        $formstub->releaseEvents()->willReturn(array());

        $dispatcher->dispatch([])->shouldBeCalled();

        $this->handle($command)->shouldReturn($formstub);
    }
}


class SubmitFormCommandStub {
    public $input = [
        "name" => "Test Name",
        "slug" => "test-name",
        "description" => "description"
    ];
}
