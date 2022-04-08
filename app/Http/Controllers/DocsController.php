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

    public function show($doc = null)
    {
        if (!$doc) {
            $doc = 'home';
        }
        $file = "markdown/{$doc}.md";

        if (!$this->documentation->exists($file)) {
            abort(404);
        }

        $content = $this->documentation->get($file);
        $title = $doc === 'home' ? '' : str_replace('-', ' ', ucfirst($doc));

        return view('docs', compact('content', 'title'));
    }
}
