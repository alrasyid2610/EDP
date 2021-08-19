<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComFormComputer2 extends Component
{
    public $jumlahData;
    public $qty;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($jumlahData, $qty)
    {
        //
        $this->jumlahData = $jumlahData;
        $this->qty = $qty;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.com-form-computer2');
    }
}
