<?php

namespace App\Http\Livewire\Admin\Domain;

use App\Models\WebsiteList;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ExpiryDomainComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $today, $afterThirtyDays;

    public function render()
    {
        $today = Carbon::now();
        $afterThirtyDays = Carbon::now()->addDays(30);

        // dd($today, $afterThirtyDays);

        $expiry_domain = WebsiteList::orderBy('created_at', 'DESC')
            ->where('expire_date', '>=' , $today)
            ->where('expire_date', '<=', $afterThirtyDays)
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);
        return view('livewire.admin.domain.expiry-domain-component', ['expiry_domain' => $expiry_domain])->layout('livewire.admin.layouts.base');
    }
}
