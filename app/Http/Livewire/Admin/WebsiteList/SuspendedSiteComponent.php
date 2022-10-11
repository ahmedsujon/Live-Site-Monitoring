<?php

namespace App\Http\Livewire\Admin\WebsiteList;

use App\Models\WebsiteList;
use Livewire\Component;
use Livewire\WithPagination;

class SuspendedSiteComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public function render()
    {
        $suspended_sites = WebsiteList::orderBy('created_at', 'DESC')->where('status', 0)
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);
        return view('livewire.admin.website-list.suspended-site-component', ['suspended_sites'=>$suspended_sites])->layout('livewire.admin.layouts.base');
    }
}
