<?php namespace Kraken\Transformers;

use Kraken\Models\Form;
use League\Fractal\TransformerAbstract;

class FormTransformer extends TransformerAbstract {

    /**
     * @var Form
     */
    private $form;

    /**
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * @param User $user
     * @return array
     */
    public function transform(Form $form)
    {
        return [
            'id'    => (int) $form->id,
            'name' => $form->name
        ];
    }

}