<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Stat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $body)
    {
        $this->data['title']        = $title;
        $this->data['body']         = $body;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stat', $this->data);
    }
}
