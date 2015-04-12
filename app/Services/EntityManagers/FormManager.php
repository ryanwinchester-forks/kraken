<?php namespace SevenShores\Kraken\Services\EntityManagers;

use SevenShores\Kraken\Form;

class FormManager extends EntityManager
{
    /**
     * @param string $name
     * @param string $slug
     * @param array $relations
     * @return mixed
     */
    public function create($name, $slug, array $relations = [])
    {
        $form = Form::create([
            'name' => $name,
            'slug' => $slug,
        ]);

        if (! empty($relations)) {
            foreach ($relations as $relation => $ids) {
                $form->attach($relation, $ids);
            }
        }

        $form->save();

        return $form;
    }

    /**
     * @param int $form_id
     * @param string $name
     * @param string $slug
     * @param array $relations
     * @return mixed
     */
    public function update($form_id, $name = null, $slug = null, array $relations = [])
    {
        $form = Form::findOrFail($form_id);

        $data = [];

        if (! is_null($name)) {
            $data['name'] = $name;
        }

        if (! is_null($slug)) {
            $data['slug'] = $slug;
        }

        $form->update($data);

        if (! empty($relations)) {
            $form = $this->handleRelations($form, $relations);
        }

        $form->save();

        return $form;
    }
}