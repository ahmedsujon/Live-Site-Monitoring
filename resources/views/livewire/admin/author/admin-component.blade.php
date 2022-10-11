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
                    <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-primary">New Admin</a>
                </div>
            </div><!-- end card header -->

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
                                <th scope="col">Image</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($admins->count() > 0)
                            @foreach ($admins as $admin)
                            <tr>
                                <td>
                                    <div class="avatar-group">
                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-3.jpg"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                            title="" data-bs-original-title="Username">
                                            <img src="{{ asset('uploads/profile') }}/{{ $admin->avatar }}" alt=""
                                                class="rounded-circle avatar-xxs"
                                                onerror="this.onerror=null;this.src='{{ asset('assets/default/avatar.jpg') }}';">
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $admin->first_name }}</td>
                                <td>{{ $admin->last_name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>
                                    <a type="button" wire:click.prevent="editData({{ $admin->id }})"
                                        class="btn btn-outline-success btn-icon rounded-circle waves-effect waves-light shadow-none"><i
                                            class="ri-eye-line"></i></a>
                                    <a type="button" wire:click.prevent="editData({{ $admin->id }})"
                                        class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none"><i
                                            class="ri-edit-line"></i></a>
                                    <a wire:click.prevent="deleteConfirmation({{ $admin->id }})"
                                        class="btn btn-outline-danger btn-icon rounded-circle waves-effect waves-light shadow-none"><i
                                            class="ri-delete-bin-5-line"></i></a>
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
            {{ $admins->links('pagination-links-table') }}
        </div>
    </div>
    {{-- add modal --}}
    <div id="myModal" wire:ignore.self class="modal zoomIn" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Send Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form wire:submit.prevent="storeData">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">First Name</label>
                                <input type="text" wire:model="first_name" class="form-control form-control-icon">
                                @error('first_name')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Last Name</label>
                                <input type="text" wire:model="last_name" class="form-control form-control-icon">
                                @error('last_name')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Email</label>
                                <input type="email" wire:model="email" class="form-control form-control-icon">
                                @error('email')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Phone</label>
                                <input type="number" wire:model="phone" class="form-control form-control-icon">
                                @error('phone')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Password</label>
                                <input type="password" wire:model="password" class="form-control form-control-icon">
                                @error('password')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Confirm Password</label>
                                <input type="password" wire:model="confirm_password"
                                    class="form-control form-control-icon">
                                @error('confirm_password')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Profile Image</label>
                                <input type="file" wire:model="avatar" class="form-control">
                                @error('avatar')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message
                                    }}</span>
                                <br>
                                @enderror
                                <div wire:loading="avatar" wire:target="avatar" wire:key="avatar"
                                    style="font-size: 12.5px;" class="mr-2"><i
                                        class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>
                                @if ($avatar)
                                <img src="{{ $avatar->temporaryUrl() }}" class="mt-2 mb-2 rounded-circle" width="85"
                                    height="85" />
                                @elseif($upload_vatar != '')
                                <img src="{{ asset('uploads/profile') }}/{{ $upload_vatar }}"
                                    class="mt-2 mb-2 rounded-circle" width="85" height="85" />
                                @endif
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
            $('#myModal').modal('hide');
        });
    //Success Delete

    window.addEventListener('adminDeleted', event => {
            Swal.fire(
                'Deleted!',
                'Admin has been deleted successfully.',
                'success'
            )
        });
</script>
@endpush