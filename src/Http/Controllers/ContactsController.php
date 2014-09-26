<?php namespace Kraken\Http\Controllers;

use Kraken\Contracts\Contact;
use Input, Redirect;
use Kraken\Http\Requests\AddContactRequest;

class ContactsController extends BaseController {

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @param Contact $contact
     */
    function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = $this->contact->all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param  AddContactRequest $request
     * @return Response
     */
    public function store(AddContactRequest $request)
    {
        try
        {
            $response = $this->execute($request->toCommand());

            return Redirect::route('contacts.index')->with($response->status(), $response->message());
        }
        catch (CommandHandlerException $e)
        {
            return Redirect::back()->withErrors($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return "Show contact with id {$id}";
    }

    public function edit($id)
    {
        $contact = $this->contact->findById($id);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $contact = $this->contact->findById($id);

        $contact->update(Input::all());

        return Redirect::route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return view();
    }

}
