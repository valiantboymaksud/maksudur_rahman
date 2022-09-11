<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FloatingText extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $required=null, $value= null, $title=null, $placeholder=null, $height = 110)
    {
        $this->data['name']         = $name;
        $this->data['title']        = $title ?? ucfirst($name);
        $this->data['placeholder']  = $placeholder ?? $title;
        $this->data['required']     = $required;
        $this->data['value']        = $value ?? old($name);
        $this->data['height']       = $height ?? 110;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.floating-text', $this->data);
    }
}
