<?php namespace SevenShores\Kraken\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Symfony\Component\DependencyInjection\Dumper\YamlDumper;

abstract class Controller extends BaseController
{
    use DispatchesCommands, ValidatesRequests;

    /**
     * Return a JSON response.
     *
     * @param string $data JSON string
     * @return mixed
     */
    protected function jsonResponse($data)
    {
        return response($data)->header('Content-Type', 'application/json');
    }

    protected function yamResponse($data)
    {
        $dumper = app(YamlDumper::class);
        $content = $dumper->dump($data, 2);

        return response($content)->header('Content-Type', 'application/x-yaml');
    }
}
