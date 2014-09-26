<?php

namespace spec\Kraken\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Laracasts\Commander\Events\EventDispatcher;
use Kraken\Repositories\EloquentContactRepository as Contact;

class AddContactCommandHandlerSpec extends ObjectBehavior
{
    function let(Contact $contact)
    {
        $this->beConstructedWith($contact);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kraken\Commands\AddContactCommandHandler');
    }

    function it_adds_a_contact(EventDispatcher $dispatcher, Contact $contact, AddContactCommandStub $command, ContactStub $contactstub)
    {
        $contact->add([
            'first_name' => "Test",
            'last_name' => "Name",
            'email' => "email@email.com"
        ])->shouldBeCalled()->willReturn($contactstub);

        $this->setDispatcher($dispatcher);

        $contactstub->releaseEvents()->willReturn(array());

        $dispatcher->dispatch([])->shouldBeCalled();

        $this->handle($command)->shouldReturn($contactstub);
    }
}


class ContactStub { function releaseEvents() {} }
class AddContactCommandStub {
    public $input = [
        "first_name" => "Test",
        "last_name" => "Name",
        "email" => "email@email.com"
    ];
}
