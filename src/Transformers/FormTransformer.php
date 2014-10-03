<?php namespace Kraken\Transformers;

use Kraken\Models\Form;
use League\Fractal\TransformerAbstract;

class FormTransformer extends TransformerAbstract {

    /**
     * @param Form $form
     * @return array
     */
    public function transform(Form $form)
    {
        return [
            'id'   => (int) $form->id,
            'name' => $form->name
        ];
    }

}