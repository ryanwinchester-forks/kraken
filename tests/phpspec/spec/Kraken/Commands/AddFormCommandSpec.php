<?php

namespace spec\Kraken\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddFormCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kraken\Commands\AddFormCommand');
    }
}
