<?php namespace Kraken\Http\Controllers\Api;

use Kraken\Entities\Fields\FieldRepository;
use Kraken\Http\Controllers\BaseController;

class FieldsController extends BaseController {

    /**
     * @var FieldRepository
     */
    protected $field;

    /**
     * @param FieldRepository $field
     */
    function __construct(FieldRepository $field)
    {
        $this->field = $field;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->field->all();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return "Save field";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "Show field with id {$id}";
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "Update field";
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
