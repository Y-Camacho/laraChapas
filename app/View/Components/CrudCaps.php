<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrudCaps extends Component
{
    public $figureList;
    public $collector;
    public function __construct($figureList, $collector)
    {
        $this->figureList = $figureList;
        $this->collector = $collector;
    }

    public function render(): View|Closure|string
    {
        return view('components.crud-caps');
    }
}
