<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $title;
    public $desc;

    public function __construct($title = null, $desc = null)
    {
        $this->title = $title;
        $this->desc = $desc;
    }

    public function render()
    {
        return view('components.header');
    }
}