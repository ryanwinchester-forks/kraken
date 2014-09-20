<?php namespace Kraken\Http\Controllers;

use Kraken\Contracts\Contact;
use Input, Redirect;

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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return "Save contact";
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
