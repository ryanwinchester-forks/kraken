<?php namespace Kraken\Http\Controllers\Api;

use Kraken\Http\Controllers\BaseController;
use Kraken\Entities\Contacts\ContactRepository;

class ContactsController extends BaseController {

    /**
     * @var ContactRepository
     */
    protected $contact;

    /**
     * @param ContactRepository $contact
     */
    function __construct(ContactRepository $contact)
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
		return $this->contact->all();
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "Update contact";
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
