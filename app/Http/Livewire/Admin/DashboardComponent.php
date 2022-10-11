<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\WebsiteList;

class DashboardComponent extends Component
{
    public function render()
    {
        $total_site = WebsiteList::orderBy('created_at', 'DESC')->count();
        $suspended_domain = WebsiteList::orderBy('created_at', 'DESC')->count();
        return view('livewire.admin.dashboard-component', ['total_site'=>$total_site, 'suspended_domain'=>$suspended_domain])->layout('livewire.admin.layouts.base');
    }
}
