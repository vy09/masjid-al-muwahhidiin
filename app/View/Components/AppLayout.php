<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public string $title;

    public function __construct($title = 'Mesjid')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.app');
    }
}
