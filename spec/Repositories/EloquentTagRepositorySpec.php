<?php

namespace spec\SevenShores\Kraken\Repositories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EloquentTagRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SevenShores\Kraken\Repositories\EloquentTagRepository');
    }
}
