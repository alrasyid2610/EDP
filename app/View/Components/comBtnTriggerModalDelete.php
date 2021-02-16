<?php

namespace App\View\Components;

use Illuminate\View\Component;

class comBtnTriggerModalDelete extends Component
{

    public $dataId, $route;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dataId, $route = '')
    {
        $this->dataId = $dataId;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.com-btn-trigger-modal-delete');
    }
}
