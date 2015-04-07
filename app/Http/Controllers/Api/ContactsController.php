<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Contracts\Repositories\ContactRepository;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Requests\CreateContactRequest;
use SevenShores\Kraken\Transformers\ContactTransformer;
use SevenShores\Kraken\Transformers\Factory as Transformer;

class ContactsController extends ApiController
{
    /**
     * @var TransformerManager
     */
    private $manager;

    /**
     * @var ContactRepository
     */
    private $contacts;

    /**
     * @param TransformerManager $manager
     * @param ContactRepository $contacts
     */
    public function __construct(TransformerManager $manager, ContactRepository $contacts)
    {
        $this->manager = $manager;
        $this->contacts = $contacts;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $params = $this->getParamsFromRequest($request);

        $contacts = $this->contacts->cursor($request->get('cursor'), $params);

        $cursor = [
            'current' => $request->get('cursor'),
        ];

        $data = $this->manager->cursorCollection($contacts, new ContactTransformer(), $cursor);

        return $this->jsonResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateContactRequest $request
     * @return Response
     */
    public function store(CreateContactRequest $request)
    {
        return response()->json(['store contact in db']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
