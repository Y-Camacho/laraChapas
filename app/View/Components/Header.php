<?php

namespace App\View\Components;

use Closure;
use App\Models\Collector;
use App\Enums\UserRol;
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
        $collector = null;
        if(auth()->check()){
            $collector = Collector::with('user')->where("user_id", auth()->user()->id)->first();
        }
        
        $this->loged = auth()->check();
        
        if(!$collector){
            return view('components.header', [
                'loged' => $this->loged,
            ]);
        }

        $isAdmin = strcmp($collector->user->rol, UserRol::Admin->value) == 0;

        return view('components.header', [
            'loged' => $this->loged,
            'admin' => $isAdmin,
            'id' => $collector->id,
        ]);
    }
}
