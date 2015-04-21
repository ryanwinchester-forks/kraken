<?php namespace SevenShores\Kraken\Http\Controllers;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contracts\Repositories\PropertyRepository;

class PropertiesController extends Controller
{
    /**
     * @var PropertyRepository
     */
    private $properties;

    /**
     * @param PropertyRepository $properties
     */
    public function __construct(PropertyRepository $properties)
    {
        $this->properties = $properties;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = $this->properties->getAll();

        return view('properties.list', compact('properties'));
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
     * Show the form to update a Property.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = $this->properties->getById($id);

        return view('properties.edit', compact('property'));
    }

    /**
     * Show the form to create a Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return;
    }
}
