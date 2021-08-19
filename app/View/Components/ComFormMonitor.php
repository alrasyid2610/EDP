<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComFormMonitor extends Component
{
    public $jumlahData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($jumlahData)
    {
        $this->jumlahData = $jumlahData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.com-form-monitor');
    }
}
