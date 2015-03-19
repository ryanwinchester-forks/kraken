<?php

namespace spec\SevenShores\Kraken;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PropertySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SevenShores\Kraken\Property');
    }
}
