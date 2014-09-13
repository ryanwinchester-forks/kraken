<?php

namespace spec\Kraken\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddFormCommandSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Test Form', 'test-form', 'Some test form.');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kraken\Commands\AddFormCommand');
    }
}
