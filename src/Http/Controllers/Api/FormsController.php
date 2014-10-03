<?php namespace Kraken\Http\Controllers\Api;

use Kraken\Contracts\Form;
use Kraken\Http\Controllers\BaseController;
use Input;

class FormsController extends BaseController {

    /**
     * @var Form
     */
    protected $form;

    /**
     * @param Form $form
     */
    function __construct(Form $form)
    {
        $this->form = $form;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//		$limit = Input::has('limit') ? Input::get('limit') : 20;
//
//        $forms = $this->form->paginate($limit);

        return $this->form->all();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return "Save form";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "Show form with id {$id}";
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "Update form";
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
