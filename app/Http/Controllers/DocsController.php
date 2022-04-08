<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use Illuminate\Http\Request;

class DocsController extends Controller
{
    protected $section = 'docs';

    public function __construct(Documentation $documentation)
    {
        $this->documentation = $documentation;
    }

    public function show($page = null)
    {
        if (!$page) {
            $page = 'home';
        }
        $file = "markdown/{$page}.md";

        if (!$this->documentation->exists($file)) {
            abort(404);
        }

        $page = $this->documentation->get($file);

        return view('docs', compact('page'));
    }
}
