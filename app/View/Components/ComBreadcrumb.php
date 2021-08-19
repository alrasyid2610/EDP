<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComBreadcrumb extends Component
{
    public $array;
    
    /**
     * Create a new component instance.
     *
     * @param Array [name, 'name' => link1 ...]
     * @return void
     */
    public function __construct($array = '')
    {
        $this->array;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.com-breadcrumb');
    }
}
