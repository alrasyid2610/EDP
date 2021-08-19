<?php

namespace App\View\Components;

use App\Models\LaptopDevice;
use Illuminate\View\Component;

class ComFormLaptop extends Component
{

    public $jumlahData;
    public $data_laptop;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($jumlahData)
    {
        $this->jumlahData = $jumlahData;
        $this->data_laptop = LaptopDevice::all()->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.com-form-laptop');
    }
}
