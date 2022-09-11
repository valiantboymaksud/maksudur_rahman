<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusUpdate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($table, $id, $status)
    {
        $this->data['table_name']   = $table;
        $this->data['id']           = $id;
        $this->data['status']       = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.status-update', $this->data);
    }
}
