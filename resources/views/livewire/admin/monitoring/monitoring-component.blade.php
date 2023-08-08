<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Monitoring</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Monitoring Website</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Monitoring Website</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 mb-2 sort_cont">
                        <label class="font-weight-normal" style="">Show</label>
                        <select name="sortuserresults" class="sinput" id="" wire:model="sortingValue">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <label class="font-weight-normal" style="">entries</label>
                    </div>

                    <div class="col-md-6 col-sm-12 mb-2 search_cont">
                        <label class="font-weight-normal mr-2">Search:</label>
                        <input type="search" class="sinput" placeholder="Search" wire:model="searchTerm" />
                    </div>
                </div>
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                        <thead class="text-muted table-light">
                            <tr>
                                <th scope="col">Website Name</th>
                                <th scope="col">Domain Name</th>
                                <th scope="col">Purchase Date</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Remaining Days</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($monitorings->count() > 0)
                            @foreach ($monitorings as $websitelist)
                            @php
                            $to = \Carbon\Carbon::parse($websitelist->expire_date);
                            $from = \Carbon\Carbon::now();
                            $diff_in_days = $to->diffInDays($from);
                            @endphp

                            <tr>
                                <td>{{ $websitelist->name }}</td>
                                <td>{{ $websitelist->url }}</td>
                                <td>{{ $websitelist->created_on }}</td>
                                <td>{{ $websitelist->expire_date }}</td>
                                <td>{{ $diff_in_days }} days</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" style="text-align: center;">No data available!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $monitorings->links('pagination-links-table') }}
        </div>
    </div>
</div>