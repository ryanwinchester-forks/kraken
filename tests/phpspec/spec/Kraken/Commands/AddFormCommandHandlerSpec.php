<?php

namespace spec\Kraken\Commands;

use Kraken\Repositories\EloquentFormRepository as Form;
use Kraken\Commands\AddFormCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddFormCommandHandlerSpec extends ObjectBehavior
{
    function let(Form $form)
    {
        $this->beConstructedWith($form);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kraken\Commands\AddFormCommandHandler');
    }

    function it_adds_a_form(Form $form, AddFormCommand $command)
    {
//        $form->add([
//            'name' => null,
//            'slug' => null,
//            'description' => null
//        ])->shouldBeCalled()->willReturn(null);
//
//        $this->dispatchEventsFor($form)->shouldBeCalled();
//
//        $this->handle($command);
    }
}
