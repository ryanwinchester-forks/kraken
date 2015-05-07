<?php namespace SevenShores\Kraken\Http\Controllers;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contracts\Repositories\FormRepository;

class FormsController extends Controller
{
    /**
     * @var FormRepository
     */
    private $forms;

    /**
     * @param FormRepository $forms
     */
    public function __construct(FormRepository $forms)
    {
        $this->forms = $forms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = $this->forms->getAll();

        return view('forms.list', compact('forms'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return;
    }

    /**
     * Show the form to update a Form.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = $this->forms->getById($id);

        return view('forms.edit', compact('form'));
    }

    /**
     * Show the form to create a Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return;
    }

    public function render($id)
    {
        $form = $this->forms->getById($id);

        return view('forms.render', compact('form'));
    }
}
