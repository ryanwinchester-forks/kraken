<?php

namespace spec\SevenShores\Kraken\Repositories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EloquentUserRepositorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('SevenShores\Kraken\Repositories\EloquentUserRepository');
    }
}
