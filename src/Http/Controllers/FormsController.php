<?php namespace Kraken\Http\Controllers;

use Kraken\Contracts\Form;
use Input, Redirect;

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
		$forms = $this->form->all();

        return view('forms.index', compact('forms'));
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

    public function edit($id)
    {
        $form = $this->form->findById($id);

        return view('forms.edit', compact('form'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$form = $this->form->findById($id);

        $form->update(Input::all());

        return Redirect::route('forms.index');
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
