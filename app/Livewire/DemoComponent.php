<?php

namespace App\Livewire;

use Livewire\Component;

class DemoComponent extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div>
            Hello from Livewire 👋🏼
        </div>
        HTML;
    }
}
