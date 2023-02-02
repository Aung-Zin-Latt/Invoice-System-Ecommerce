<div>
    <!-- Navbar -->
    <x-navbar.navbar />

    <div class="container-fluid page-body-wrapper">
        <!-- Sidebar -->
        <x-sidebar.sidebar />
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="card">
                    <div class="card-header">
                        <h3>Edit Delivery
                            <a href="{{ route('all-deliveries') }}" class="btn btn-primary text-white float-end">All Deliveries</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <span class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </span>
                        @endif
                        <form wire:submit.prevent="updateDelivery" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">State</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="State" class="form-control input-md"
                                            wire:model="state" />
                                        @error('state')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Basic Cost</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="Basic Cost"
                                            class="form-control input-md" wire:model="basic_cost" />
                                        @error('basic_cost')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Waiting Time</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Waiting Time"
                                            class="form-control input-md" wire:model="waiting_time" />
                                        @error('waiting_time')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label"></label>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary text-white">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col md 6">Edit Delivery</div>
                                        <div class="col md 6">
                                            <a href="{{ route('all-deliveries') }}"
                                                class="btn btn-success pull-right">All Deliveries</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent="updateDelivery">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">State</label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="State" class="form-control input-md"
                                                    wire:model="state" />
                                                @error('state')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Basic Cost</label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Basic Cost"
                                                    class="form-control input-md" wire:model="basic_cost" />
                                                @error('basic_cost')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Waiting Time</label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Waiting Time"
                                                    class="form-control input-md" wire:model="waiting_time" />
                                                @error('waiting_time')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label"></label>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
    <x-sidebar.footer />
</div>
