<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $roles = Role::all();
        return view('layouts.app', compact('roles'));
    }
}
