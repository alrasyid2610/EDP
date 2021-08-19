<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComTableComputers extends Component
{
    public $title, $route, $dataComputer, $dataSection;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $route, $dataComputer = "", $dataSection="")
    {
        $this->title = $title;
        $this->route = $route;
        $this->dataComputer = $dataComputer;
        $this->dataSection = $dataSection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.com-table-computers');
    }
}
