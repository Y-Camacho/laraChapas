<?php

namespace App\View\Components;

use Closure;
use App\Models\Collector;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    private $loged;

    public function __construct()
    {

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $id = null;
        if(auth()->check()){
            $id = Collector::where("user_id", auth()->user()->id)->value("id");
        }
        
        $this->loged = auth()->check();
        
        if(!$id){
            return view('components.header', [
                'loged' => $this->loged,
            ]);
        }

        return view('components.header', [
            'loged' => $this->loged,
            'id' => $id,
        ]);
    }
}
