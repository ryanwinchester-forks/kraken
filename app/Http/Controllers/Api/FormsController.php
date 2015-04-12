<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contracts\Repositories\FormRepository;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Requests\StoreFormRequest;
use SevenShores\Kraken\Http\Requests\UpdateFormRequest;
use SevenShores\Kraken\Services\EntityManagers\FormManager;
use SevenShores\Kraken\Transformers\FormTransformer;

class FormsController extends ApiController
{
    /**
     * @var FormRepository
     */
    private $forms;

    /**
     * @param TransformerManager $manager
     * @param FormRepository $forms
     */
    public function __construct(TransformerManager $manager, FormRepository $forms)
    {
        parent::__construct($manager);
        $this->forms = $forms;
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

        $forms = $this->forms->cursor($request->get('cursor'), $options);

        return $this->respondWithCursor($forms, new FormTransformer(), $options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFormRequest $request
     * @param FormManager $formManager
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request, FormManager $formManager)
    {
        $form = $formManager->create(
            $request->json('name'),
            $request->json('slug'),
            $request->json('attach', [])
        );

        return $this->respondWithItem($form, new FormTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = $this->forms->getById($id);

        return $this->respondWithItem($form, new FormTransformer());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param UpdateFormRequest $request
     * @param FormManager $formManager
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateFormRequest $request, FormManager $formManager)
    {
        $form = $formManager->update(
            $id,
            $request->json('name'),
            $request->json('slug'),
            $request->json('relations', [])
        );

        return $this->respondWithItem($form, new FormTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = $this->forms->getById($id);
        $form->delete();

        return $this->respondWithItem($form, new FormTransformer());
    }
}
