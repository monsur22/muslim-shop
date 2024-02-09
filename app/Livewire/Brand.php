<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Brand extends Component
{
    // #[Layout('layouts.admin_layout')]

    public function render()
    {
        return view('livewire.brand')->extends('layouts.admin_layout');
    }
}
