<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contracts\Repositories\PropertyOptionRepository;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Requests\StorePropertyOptionRequest;
use SevenShores\Kraken\Http\Requests\UpdatePropertyOptionRequest;
use SevenShores\Kraken\Services\EntityManagers\PropertyOptionManager;
use SevenShores\Kraken\Transformers\PropertyOptionTransformer;

class PropertyOptionsController extends ApiController
{
    /**
     * @var PropertyOptionRepository
     */
    private $propertyOptions;

    /**
     * @param TransformerManager $manager
     * @param PropertyOptionRepository $propertyOptions
     */
    public function __construct(TransformerManager $manager, PropertyOptionRepository $propertyOptions)
    {
        parent::__construct($manager);
        $this->propertyOptions = $propertyOptions;
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

        $propertyOptions = $this->propertyOptions->cursor($request->get('cursor'), $options);

        return $this->respondWithCursor($propertyOptions, new PropertyOptionTransformer(), $options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePropertyOptionRequest $request
     * @param PropertyOptionManager $propertyOptionManager
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyOptionRequest $request, PropertyOptionManager $propertyOptionManager)
    {
        $propertyOption = $propertyOptionManager->create(
            $request->json('value'),
            $request->json('label'),
            $request->json('attach', [])
        );

        return $this->respondWithItem($propertyOption, new PropertyOptionTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propertyOption = $this->propertyOptions->getById($id);

        return $this->respondWithItem($propertyOption, new PropertyOptionTransformer());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param UpdatePropertyOptionRequest $request
     * @param PropertyOptionManager $propertyOptionManager
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdatePropertyOptionRequest $request, PropertyOptionManager $propertyOptionManager)
    {
        $propertyOption = $propertyOptionManager->update(
            $id,
            $request->json('value'),
            $request->json('label'),
            $request->json('relations', [])
        );

        return $this->respondWithItem($propertyOption, new PropertyOptionTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propertyOption = $this->propertyOptions->getById($id);
        $propertyOption->delete();

        return $this->respondWithItem($propertyOption, new PropertyOptionTransformer());
    }
}
