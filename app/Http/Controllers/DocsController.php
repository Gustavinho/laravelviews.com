<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends PageController
{
    protected $section = 'docs';
    protected $defaultPage = 'README';
    protected $format = 'markdown';
}
