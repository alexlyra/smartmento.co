<?php

namespace App\View\Components\Cursos\Modulos\Aulas\Extra;

use Illuminate\View\Component;

class Edit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cursos.modulos.aulas.extra.edit');
    }
}
