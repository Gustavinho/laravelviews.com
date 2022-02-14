<?php

namespace App\Models;

use Illuminate\Filesystem\Filesystem;

class Documentation
{
    private Filesystem $fs;
    private $basePath = '';
    public $format = '';

    public function __construct(Filesystem $filesystem)
    {
        $this->fs = $filesystem;
        $this->basePath = resource_path('docs');
    }

    public function setBasePath($path)
    {
        $this->basePath = $path;
    }

    public function getPage($page)
    {
        if ($this->isSingleFile()) {
            $pages = $this->getPages();
            return $pages->$page;
        }

        $page = $this->addExtention($page);
        return $this->fs->get($this->path($page));
    }

    public function get($doc)
    {
        return $this->fs->get($this->path("{$doc}"));
    }

    public function exists($page): bool
    {
        $page = $this->addExtention($page);
        if ($this->isSingleFile()) {
            $pages = $this->getPages();
            return isset($pages->$page);
        }

        return $this->fs->exists($this->path($page));
    }

    private function getPages()
    {
        return json_decode($this->fs->get($this->path("pages.json")));
    }

    private function path($subpath)
    {
        return $this->basePath . '/' . $subpath;
    }

    private function isSingleFile()
    {
        return $this->fs->exists($this->path('pages.json'));
    }

    private function addExtention($page)
    {
        if ($this->format === 'markdown') {
            $page = $page . '.md';
        }

        return $page;
    }
}
