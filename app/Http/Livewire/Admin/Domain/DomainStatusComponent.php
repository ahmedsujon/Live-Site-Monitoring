<?php

namespace App\Http\Livewire\Admin\Domain;

use Livewire\Component;
use App\Models\WebsiteList;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class DomainStatusComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    
    public function render()
    {

        // $check_status = Http::get('gossogle.com');
        // dd(dns_get_record("google.com"));
        // if (sizeof(dns_get_record("googlewew.com")) > 0) echo "Website Status: 200 OK";
        // else echo "Website Status: 500";
        // exit();


        $domain_status = WebsiteList::orderBy('created_at', 'DESC')
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);
        return view('livewire.admin.domain.domain-status-component', ['domain_status' =>$domain_status])->layout('livewire.admin.layouts.base');
    }
}
