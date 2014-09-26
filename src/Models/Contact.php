<?php namespace Kraken\Models;

use Laracasts\Presenter\PresentableTrait;

class Contact extends BaseModel {

    use PresentableTrait;

    /**
     * @var string
     */
    protected $presenter = 'Kraken\Presenters\ContactPresenter';

    /**
     * The rows that can't be assigned by mass-assignment.
     *
     * @var array
     */
    protected $guarded = array('id');
}
