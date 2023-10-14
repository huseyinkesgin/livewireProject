<?php

namespace App\Livewire;

use Livewire\Component;

class CountryTable extends Component
{
    public $createForm = false;
    public $table = true;

    public function Create()
    {
        $this->createForm = true;
        $this->table = false;
    }
    public function TableShow()
    {
        $this->createForm = false;
        $this->table = true;
    }
    
    public function render()
    {
        return view('admin.country-table');
    }
}
