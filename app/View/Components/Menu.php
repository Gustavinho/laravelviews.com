<?php

namespace App\View\Components;

use App\Models\Documentation;
use Illuminate\View\Component;
use Symfony\Component\Yaml\Yaml;

class Menu extends Component
{
    public Documentation $documentation;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Documentation $documentation)
    {
        $this->documentation = $documentation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $menu = Yaml::parse($this->documentation->get('menu.yml'));

        return view('components.menu', [
            'menu' => json_decode(json_encode($menu))
        ]);
    }
}
