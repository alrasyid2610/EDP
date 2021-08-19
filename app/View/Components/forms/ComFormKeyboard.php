<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class ComFormKeyboard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $jumlahData;

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
        return view('components.forms.com-form-keyboard');
    }
}
