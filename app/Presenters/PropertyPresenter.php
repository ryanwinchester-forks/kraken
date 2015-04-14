<?php namespace SevenShores\Kraken\Presenters;

use SevenShores\Kraken\Property;

class PropertyPresenter extends Presenter
{
    /**
     * @param Property $resource
     */
    public function __construct(Property $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function formElement()
    {
        //
    }
}