<?php namespace SevenShores\Kraken\Services\EntityManagers;

use SevenShores\Kraken\PropertyOption;

class PropertyOptionManager extends EntityManager
{
    /**
     * @param string $value
     * @param string $label
     * @param array $relations
     * @return mixed
     */
    public function create($value, $label, array $relations = [])
    {
        $propertyOption = PropertyOption::create([
            'value' => $value,
            'label' => $label,
        ]);

        if (! empty($relations)) {
            foreach ($relations as $relation => $ids) {
                $propertyOption->attach($relation, $ids);
            }
        }

        $propertyOption->save();

        return $propertyOption;
    }

    /**
     * @param int $propertyOptionId
     * @param string $value
     * @param null $label
     * @param array $relations
     * @return mixed
     */
    public function update(
        $propertyOptionId,
        $value = null,
        $label = null,
        array $relations = []
    ) {
        $propertyOption = PropertyOption::findOrFail($propertyOptionId);

        $data = [];

        if (! is_null($value)) {
            $data['value'] = $value;
        }

        if (! is_null($label)) {
            $data['label'] = $label;
        }

        $propertyOption->update($data);

        if (! empty($relations)) {
            $propertyOption = $this->handleRelations($propertyOption, $relations);
        }

        $propertyOption->save();

        return $propertyOption;
    }
}
