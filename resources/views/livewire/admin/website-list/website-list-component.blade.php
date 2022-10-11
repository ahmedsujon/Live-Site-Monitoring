<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Admin</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">All Admins</h4>
                <div class="flex-shrink-0">
                    <a data-bs-toggle="modal" data-bs-target="#addDataModal" class="btn btn-sm btn-primary">Add New
                        Website</a>
                </div>
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
                                <th scope="col">Company / Owner</th>
                                <th scope="col">Address</th>
                                <th scope="col">Added On</th>
                                <th scope="col">Status</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($websitelists->count() > 0)
                            @foreach ($websitelists as $websitelist)
                            <tr>
                                <td>{{ $websitelist->name }}</td>
                                <td>{{ $websitelist->url }}</td>
                                <td>{{ $websitelist->company }}</td>
                                <td>{{ $websitelist->address }}</td>
                                <td>{{ $websitelist->created_at }}</td>
                                <td>
                                    <div class="form-check form-switch form-switch-success">
                                        <input class="form-check-input publishStatus" type="checkbox"
                                            id="customSwitchSuccess" data-website_id="{{ $websitelist->id }}"
                                            @if($websitelist->status == 1) checked @endif>
                                    </div>
                                </td>
                                <td>
                                    @if ($websitelist->status == 1)
                                    <span class="badge badge-soft-success">Active</span>
                                    @else
                                    <span class="badge badge-soft-danger">Suspended</span>
                                    @endif
                                </td>
                                <td><a data-bs-toggle="modal" data-bs-target="#editDataModal" type="button"
                                        wire:click.prevent="editData({{ $websitelist->id }})"
                                        class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none"><i
                                            class="ri-edit-line"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" style="text-align: center;">No data available!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $websitelists->links('pagination-links-table') }}
        </div>
    </div>

    <!-- Modal -->
    <div id="addDataModal" wire:ignore.self class="modal zoomIn" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add New Website</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form wire:submit.prevent="storeData">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Website Name</label>
                                <input type="text" wire:model="name" class="form-control form-control-icon">
                                @error('name')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Website URL</label>
                                <input type="text" wire:model="url" class="form-control form-control-icon">
                                @error('url')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="iconrightInput" class="form-label">Domain Purchase Date</label>
                                <input type="date" wire:model="created_on" class="form-control form-control-icon">
                                @error('created_on')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="iconrightInput" class="form-label">Expire Date</label>
                                <input type="date" wire:model="expire_date" class="form-control form-control-icon">
                                @error('expire_date')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="iconrightInput" class="form-label">Company/Owner</label>
                                <input type="text" wire:model="company" class="form-control form-control-icon">
                                @error('company')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="iconrightInput" class="form-label">Location/Address</label>
                                <input type="text" wire:model="address" class="form-control form-control-icon">
                                @error('address')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div id="editDataModal" wire:ignore.self class="modal zoomIn" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add New Website</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form wire:submit.prevent="updateData">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Website Name</label>
                                <input type="text" wire:model="name" class="form-control form-control-icon">
                                @error('name')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Website URL</label>
                                <input type="text" wire:model="url" class="form-control form-control-icon">
                                @error('url')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="iconrightInput" class="form-label">Domain Purchase Date</label>
                                <input type="date" wire:model="created_on" class="form-control form-control-icon">
                                @error('created_on')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="iconrightInput" class="form-label">Expire Date</label>
                                <input type="date" wire:model="expire_date" class="form-control form-control-icon">
                                @error('expire_date')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="iconrightInput" class="form-label">Company/Owner</label>
                                <input type="text" wire:model="company" class="form-control form-control-icon">
                                @error('company')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="iconrightInput" class="form-label">Location/Address</label>
                                <input type="text" wire:model="address" class="form-control form-control-icon">
                                @error('address')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    // Modal
    window.addEventListener('closeModal', event => {
            $('#addDataModal').modal('hide');
            $('#editDataModal').modal('hide');
        });

        window.addEventListener('editModal', event => {
            $('#editDataModal').modal('show');
        });

        $(document).ready(function(){
        $('.publishStatus').on('click', function(){
            var id = $(this).data('website_id');
            @this.publishStatus(id);
        });
    });
</script>
@endpush