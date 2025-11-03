<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FigureList extends Component
{
    public $figureList;
    public function __construct($figureList)
    {
        $this->figureList = $figureList;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.figure-list');
    }
}
