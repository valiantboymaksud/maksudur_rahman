<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $required=null, $value= null,$title=null, $placeholder=null, $type="text")
    {
        $this->data['type']         = $type;
        $this->data['name']         = $name;
        $this->data['title']        = $title ?? ucfirst($name);
        $this->data['placeholder']  = $placeholder;
        $this->data['required']     = $required;
        $this->data['value']        = $value ?? old($name);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input', $this->data);
    }
}
