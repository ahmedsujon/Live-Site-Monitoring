<?php

namespace App\Http\Livewire\Admin\Tools;

use Livewire\Component;

class CsvChunkComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.tools.csv-chunk-component')->layout('livewire.admin.layouts.base');
    }
}
