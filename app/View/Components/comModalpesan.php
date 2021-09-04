<?php

namespace App\View\Components;

use Illuminate\View\Component;

class comModalpesan extends Component
{
    public $message = '';


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = 'Ini adalah pesan default')
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.com-modalpesan');
    }
}
