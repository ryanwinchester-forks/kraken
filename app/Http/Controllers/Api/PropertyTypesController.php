<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contracts\Repositories\PropertyTypeRepository;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Requests\StorePropertyTypeRequest;
use SevenShores\Kraken\Http\Requests\UpdatePropertyTypeRequest;
use SevenShores\Kraken\Services\EntityManagers\PropertyTypeManager;
use SevenShores\Kraken\Transformers\PropertyTypeTransformer;

class PropertyTypesController extends ApiController
{
    /**
     * @var PropertyTypeRepository
     */
    private $propertyTypes;

    /**
     * @param TransformerManager $manager
     * @param PropertyTypeRepository $propertyTypes
     */
    public function __construct(TransformerManager $manager, PropertyTypeRepository $propertyTypes)
    {
        parent::__construct($manager);
        $this->propertyTypes = $propertyTypes;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $options = [
            'current' => $request->get('cursor'),
            'count'   => $request->get('count'),
            'prev'    => $request->get('prev'),
        ];

        $propertyTypes = $this->propertyTypes->cursor($request->get('cursor'), $options);

        return $this->respondWithCursor($propertyTypes, new PropertyTypeTransformer(), $options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePropertyTypeRequest $request
     * @param PropertyTypeManager $propertyTypeManager
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyTypeRequest $request, PropertyTypeManager $propertyTypeManager)
    {
        $propertyType = $propertyTypeManager->create(
            $request->json('name'),
            $request->json('element'),
            $request->json('type'),
            $request->json('is_void'),
            $request->json('attach', [])
        );

        return $this->respondWithItem($propertyType, new PropertyTypeTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propertyType = $this->propertyTypes->getById($id);

        return $this->respondWithItem($propertyType, new PropertyTypeTransformer());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param UpdatePropertyTypeRequest $request
     * @param PropertyTypeManager $propertyTypeManager
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdatePropertyTypeRequest $request, PropertyTypeManager $propertyTypeManager)
    {
        $propertyType = $propertyTypeManager->update(
            $id,
            $request->json('name'),
            $request->json('element'),
            $request->json('type'),
            $request->json('is_void'),
            $request->json('relations', [])
        );

        return $this->respondWithItem($propertyType, new PropertyTypeTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propertyType = $this->propertyTypes->getById($id);
        $propertyType->delete();

        return $this->respondWithItem($propertyType, new PropertyTypeTransformer());
    }
}
