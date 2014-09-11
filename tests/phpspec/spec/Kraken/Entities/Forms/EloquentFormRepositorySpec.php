<?php namespace spec\Kraken\Entities\Forms;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Kraken\Entities\Forms\Form;

class EloquentFormRepositorySpec extends ObjectBehavior {

    function let(Form $form)
    {
        $this->beConstructedWith($form);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kraken\Entities\Forms\EloquentFormRepository');
    }
}
