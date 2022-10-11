<?php

namespace App\Http\Livewire\Admin\Monitoring;

use App\Models\WebsiteList;
use Livewire\Component;
use Livewire\WithPagination;

class MonitoringComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public function render()
    {
        $monitorings = WebsiteList::orderBy('created_at', 'DESC')
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);
        return view('livewire.admin.monitoring.monitoring-component', ['monitorings'=>$monitorings])->layout('livewire.admin.layouts.base');
    }
}
