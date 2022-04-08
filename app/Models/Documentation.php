<?php

namespace App\Models;

use Illuminate\Filesystem\Filesystem;

class Documentation
{
    private Filesystem $fs;
    public $basePath = '';

    public function __construct(Filesystem $filesystem)
    {
        $this->fs = $filesystem;
        $this->basePath = resource_path('docs');
    }

    public function get($file)
    {
        return $this->fs->get($this->path($file));
    }

    public function exists($file): bool
    {
        return $this->fs->exists($this->path($file));
    }

    private function path($file)
    {
        return $this->basePath . '/' . $file;
    }
}
