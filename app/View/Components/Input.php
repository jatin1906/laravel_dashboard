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

    public $type;
    public $label;
    public $class;
    public $value;
    public $name;
    public $id;
    public $placeholder;
    public $readonly;


    public function __construct($name, $label, $type = 'text', $value = null, $id = null, $class = null, $placeholder = null, $readonly = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value ?? '';
        $this->id = $id ?? $name;
        $this->class = $class ?? $name;
        $this->placeholder = $placeholder ?? '';
        $this->readonly = $readonly ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
