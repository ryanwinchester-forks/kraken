<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Property;
use SevenShores\Kraken\Contracts\Repositories\PropertyRepository;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Requests\StorePropertyRequest;
use SevenShores\Kraken\Http\Requests\UpdatePropertyRequest;
use SevenShores\Kraken\Transformers\PropertyTransformer;

class PropertiesController extends ApiController
{
    /**
     * @var PropertyRepository
     */
    private $properties;

    /**
     * @param TransformerManager $manager
     * @param PropertyRepository $properties
     */
    public function __construct(TransformerManager $manager, PropertyRepository $properties)
    {
        parent::__construct($manager);
        $this->properties = $properties;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $options = [
            'current' => $request->get('cursor'),
            'count'   => $request->get('count'),
            'prev'    => $request->get('prev'),
        ];

        $properties = $this->properties->cursor($request->get('cursor'), $options);

        return $this->respondWithCursor($properties, new PropertyTransformer(), $options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePropertyRequest $request
     * @return Response
     */
    public function store(StorePropertyRequest $request)
    {
        $property = new Property();

        $data = [
            'name'     => $request->json('name'),
            'key'      => $request->json('key'),
            'label'    => $request->json('label'),
            'default'  => $request->json('default'),
            'required' => $request->json('required'),
            'property_type_id' => $request->json('property_type_id'),
        ];

        foreach ($data as $name => $value) {
            if (! is_null($value)) {
                $property->$name = $value;
            }
        }

        $property->save();

        return $this->respondWithItem($property, new PropertyTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $property = $this->properties->getById($id);

        return $this->respondWithItem($property, new PropertyTransformer());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePropertyRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UpdatePropertyRequest $request, $id)
    {
        $property = Property::findOrFail($id);

        $data = [
            'name'     => $request->json('name'),
            'key'      => $request->json('key'),
            'label'    => $request->json('label'),
            'default'  => $request->json('default'),
            'required' => $request->json('required'),
            'property_type_id' => $request->json('property_type_id'),
        ];

        foreach ($data as $name => $value) {
            if (! is_null($value)) {
                $property->$name = $value;
            }
        }

        $property->save();

        return $this->respondWithItem($property, new PropertyTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $property = $this->properties->getById($id);
        $property->delete();

        return $this->respondWithItem($property, new PropertyTransformer());
    }
}
