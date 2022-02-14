<?php

namespace App\Http\Controllers;

use App\Models\Documentation;

class PageController extends Controller
{
    protected $documentation;
    protected $section;
    protected $defaultPage;
    protected $format = '';

    public function __construct(Documentation $documentation)
    {
        $this->documentation = $documentation;
        $this->documentation->format = $this->format;
        $this->docsPath = base_path() . '/docs';
        if ($this->section) {
            $this->documentation->setBasePath(
                resource_path('docs/' . $this->section)
            );
        }
    }

    public function show($page = null)
    {
        if (!$page) {
            $page = $this->defaultPage;
        }

        if (!$this->documentation->exists($page)) {
            abort(404);
        }

        $page = $this->documentation->getPage($page);
        $view = $this->section ?? 'docs';

        return view($view, compact('page'));
    }
}
