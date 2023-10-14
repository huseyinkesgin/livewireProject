<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ITableBaseCompenent extends Component
{
    use WithPagination;
    public function render()
    {
        return view('admin.i-table-base-compenent');
    }
}
