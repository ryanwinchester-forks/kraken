<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Controllers\Controller;
use SevenShores\Kraken\Http\Requests\CreateContactRequest;
use SevenShores\Kraken\Transformers\ContactTransformer;
use SevenShores\Kraken\Transformers\Factory as Transformer;

class ContactsController extends Controller
{
    /**
     * @var TransformerManager
     */
    private $manager;

    public function __construct(TransformerManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $transformer = new ContactTransformer();

        if ($request->has('order')) {
            $order = $request->get('order');
            if (str_contains($order, "|")) {
                list($orderColumn, $orderDirection) = explode('|', $order);
            } else {
                $orderColumn = $order;
                $orderDirection = null;
            }
            $contacts = Contact::orderBy($orderColumn, $orderDirection)->paginate($request->get('limit'));
            $contacts->appends(['order' => $request->get('order')]);
        } else {
            $contacts = Contact::paginate($request->get('limit'));
        }

        $data = $this->manager->paginatedCollection($contacts, $transformer);

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
