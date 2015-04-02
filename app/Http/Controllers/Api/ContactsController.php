<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Http\Controllers\Controller;
use SevenShores\Kraken\Http\Requests\CreateContactRequest;
use SevenShores\Kraken\Transformers\ContactTransformer;
use SevenShores\Kraken\Transformers\Factory as Transformer;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $transformer = Transformer::contactPaginator();
        $contacts = Contact::paginate();
        $data = $transformer->toJson($contacts);

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
