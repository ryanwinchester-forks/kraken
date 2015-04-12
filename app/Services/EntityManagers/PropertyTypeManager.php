<?php namespace SevenShores\Kraken\Services\EntityManagers;

use SevenShores\Kraken\PropertyType;

class PropertyTypeManager extends EntityManager
{
    /**
     * @param string $name
     * @param string $element
     * @param string $type
     * @param bool $is_void
     * @param array $relations
     * @return mixed
     */
    public function create($name, $element, $type, $is_void, array $relations = [])
    {
        $propertyType = PropertyType::create([
            'name'    => $name,
            'element' => $element,
            'type'    => $type,
            'is_void' => $is_void,
        ]);

        if (! empty($relations)) {
            foreach ($relations as $relation => $ids) {
                $propertyType->attach($relation, $ids);
            }
        }

        $propertyType->save();

        return $propertyType;
    }

    /**
     * @param int $propertyType_id
     * @param string $name
     * @param null $element
     * @param null $type
     * @param null $is_void
     * @param array $relations
     * @return mixed
     */
    public function update(
        $propertyType_id,
        $name = null,
        $element = null,
        $type = null,
        $is_void = null,
        array $relations = []
    )
    {
        $propertyType = PropertyType::findOrFail($propertyType_id);

        $data = [];

        if (! is_null($name)) {
            $data['name'] = $name;
        }

        if (! is_null($element)) {
            $data['element'] = $element;
        }

        if (! is_null($type)) {
            $data['type'] = $type;
        }

        if (! is_null($is_void)) {
            $data['is_void'] = $is_void;
        }

        $propertyType->update($data);

        if (! empty($relations)) {
            $propertyType = $this->handleRelations($propertyType, $relations);
        }

        $propertyType->save();

        return $propertyType;
    }
}