<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComDataShipDoc extends Component
{
    public $dataTable;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dataTable)
    {
        $this->dataTable = $dataTable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.com-data-ship-doc');
    }
}
