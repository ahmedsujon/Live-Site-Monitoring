<?php

namespace App\Http\Livewire\Admin\WebsiteList;

use Livewire\Component;
use App\Models\WebsiteList;
use Carbon\Carbon;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class WebsiteListComponent extends Component
{
    public $name, $url, $created_on, $expire_date, $company, $address, $edit_id;

    use WithPagination;
    use WithFileUploads;
    public $sortingValue = 10, $searchTerm;

    public function publishStatus($id)
    {
        $getSlider = WebsiteList::where('id', $id)->first();

        // $url = 'https://gearinsane.com/';
        // $headers = get_headers($url, 1);
        // dd($headers);

        if ($getSlider->status == 0) {
            $getSlider->status = 1;
            $getSlider->save();

            dispatch(function () use ($getSlider) {
                $getdata = WebsiteList::find($getSlider->id);
                $status = sizeof(dns_get_record($getdata->url)) > 0 ? 200 : 500;
                $getdata->site_status = $status;
                $getdata->save();
                $emails = [
                    "sujonahmed424@gamil.com"
                ];
                if ($status == 500) {
                    foreach ($emails as $email) {
                        $mailData['email'] = $email;
                        $mailData['subject'] = 'Support';
                        $mailData['url'] = $getdata->url;
                        Mail::send('emails.notifications', $mailData, function ($message) use ($mailData) {
                            $message->to($mailData['email'])
                                ->subject($mailData['subject']);
                        });
                    }
                }

                $to = Carbon::parse($getdata->expire_date);
                $from = Carbon::parse($getdata->created_on);
                $diff_in_days = $to->diffInDays($from);

                if($diff_in_days < 30 && $diff_in_days > 0) {
                    foreach ($emails as $email) {
                        $mailData['email'] = $email;
                        $mailData['subject'] = 'Support';
                        $mailData['remaining'] = $diff_in_days;
                        Mail::send('emails.domainnotify', $mailData, function ($message) use ($mailData) {
                            $message->to($mailData['email'])
                                ->subject($mailData['subject']);
                        });
                    }
                }

                if($getSlider->status != 0) {
                   $this->reCallfunction($getSlider); 
                }

            })->delay(5);
        } else {
            $getSlider->status = 0;
            $getSlider->save();
        }

        $this->dispatchBrowserEvent('success', ['message' => 'Status updated successfully']);
    }


    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'url' => 'required|unique:website_lists,url',
            'created_on' => 'required',
            'expire_date' => 'required',
        ]);

        $data = new WebsiteList();
        $data->name = $this->name;
        $data->url = $this->url;
        $data->created_on = $this->created_on;
        $data->expire_date = $this->expire_date;
        $data->company = $this->company;
        $data->address = $this->address;
        $data->site_status = 500;
        $data->save();
        $this->dispatchBrowserEvent('success', ['message' => 'Website added successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editData($id)
    {
        $getData = WebsiteList::where('id', $id)->first();

        $this->edit_id = $getData->id;
        $this->name = $getData->name;
        $this->url = $getData->url;
        $this->created_on = $getData->created_on;
        $this->expire_date = $getData->expire_date;
        $this->company = $getData->company;
        $this->address = $getData->address;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'url' => 'required|unique:website_lists,url,' . $this->edit_id . '',
        ]);

        $data = WebsiteList::where('id', $this->edit_id)->first();
        $data->name = $this->name;
        $data->url = $this->url;
        $data->created_on = $this->created_on;
        $data->expire_date = $this->expire_date;
        $data->company = $this->company;
        $data->address = $this->address;
        $data->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('success', ['message' => 'Domain updated successfully']);
    }
    

    private function reCallfunction($getSlider)
    {
        dispatch(function () use ($getSlider) {
            $getdata = WebsiteList::find($getSlider->id);
            $status = sizeof(dns_get_record($getdata->url)) > 0 ? 200 : 500;
            $getdata->site_status = $status;
            $getdata->save();

            $emails = [
                "sujonahmed424@gamil.com"
            ];
            if ($status == 500) {
                foreach ($emails as $email) {
                    $mailData['email'] = $email;
                    $mailData['subject'] = 'Support';
                    $mailData['url'] = $getdata->url;
                    Mail::send('emails.notifications', $mailData, function ($message) use ($mailData) {
                        $message->to($mailData['email'])
                            ->subject($mailData['subject']);
                    });
                }
            }
            $to = Carbon::parse($getdata->expire_date);
                $from = Carbon::parse($getdata->created_on);
                $diff_in_days = $to->diffInDays($from);

                if($diff_in_days < 30 && $diff_in_days > 0) {
                    foreach ($emails as $email) {
                        $mailData['email'] = $email;
                        $mailData['subject'] = 'Support';
                        $mailData['remaining'] = $diff_in_days;
                        Mail::send('emails.domainnotify', $mailData, function ($message) use ($mailData) {
                            $message->to($mailData['email'])
                                ->subject($mailData['subject']);
                        });
                    }
                }
                
            if($getSlider->status != 0) {
               $this->reCallfunction($getSlider); 
            }
        })->delay(5);
        // })->delay(Carbon::now()->addHours(24));
    }

    public function render()
    {
        $websitelists = WebsiteList::orderBy('created_at', 'DESC')
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);
        return view('livewire.admin.website-list.website-list-component', ['websitelists' => $websitelists])->layout('livewire.admin.layouts.base');
    }
}
