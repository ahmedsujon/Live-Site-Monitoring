<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\WebsiteList;

class IndexComponent extends Component
{
    public function render()
    {
        $site_status = WebsiteList::orderBy('created_at', 'DESC')->get();
        return view('livewire.app.index-component', ['site_status' => $site_status])->layout('livewire.layouts.base');
    }
}
