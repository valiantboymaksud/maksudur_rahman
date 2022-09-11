<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FloatingSelect extends Component
{


    public $data;

    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $selected=null, $collections, $required=null, $value= null, $title=null, $placeholder=null)
    {
        $this->data['selected']     = $selected;
        $this->data['name']         = $name;
        $this->data['title']        = $title ?? ucfirst($name);
        $this->data['placeholder']  = $placeholder;
        $this->data['required']     = $required;
        $this->data['value']        = $value ?? old($name);
        $this->data['collections']  = $collections;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.floating-select', $this->data);
    }
}
