<div>
    <!-- Navbar -->
    <x-navbar.navbar />

    <div class="container-fluid page-body-wrapper">
        <!-- Sidebar -->
        <x-sidebar.sidebar />
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Delivery
                                    <a href="{{ route('all-deliveries') }}" class="btn btn-primary text-white float-end">All Deliveries</a>
                                </h3>
                            </div>

                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <form class="form-horizontal" wire:submit.prevent="addDeliveryCompanyName">
                                    <div class="mb-3">
                                        <label class="py-2">Delivery Name</label>
                                            <input
                                                type="text"
                                                placeholder="Delivery Name"
                                                class="form-control input-md"
                                                wire:model="name"
                                            />
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-4 mb-3">
                                            <button type="submit" class="btn btn-primary">
                                                Add Delivery
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <form class="form-horizontal" wire:submit.prevent="addNewDelivery">
                                    <div class="mb-3">
                                        <label class="py-2">Choose Delivery</label>
                                        <div class="form-group">
                                            <select name="delivery_company" class="form-select" wire:model='company_id'>
                                                <option value="0">Select Company Name</option>
                                                @foreach ($delivery_companies as $delivery_company )
                                                    <option value="{{ $delivery_company->id }}">{{ $delivery_company->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="py-2">Choose City</label>
                                        <div class="form-group">
                                            <select name="delivery_company" class="form-select" wire:model='state'>
                                                <option value="0">Select City Name</option>
                                                @foreach ($states as $state )
                                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="py-2">Basic Cost</label>
                                        <input
                                            type="text"
                                            placeholder="Basic Cost"
                                            class="form-control input-md"
                                            wire:model="basic_cost"
                                        />
                                        @error('basic_cost')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="py-2">Waiting Time</label>
                                        <input
                                            type="text"
                                            placeholder="Waiting Time"
                                            class="form-control input-md"
                                            wire:model="waiting_time"
                                        />
                                        @error('waiting_time')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="py-2"></label>
                                        <button type="submit" class="btn btn-primary">
                                            Add New
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-sidebar.footer />
</div>





{{-- <div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col md 6">Add New Delivery</div>
                        <div class="col md 6">
                            <a href="#" class="btn btn-success pull-right">All Deliveries</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif

                    <form class="form-horizontal" wire:submit.prevent="addDeliveryCompanyName">
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                >Delivery Name</label
                            >
                            <div class="col-md-4">
                                <input
                                    type="text"
                                    placeholder="Delivery Name"
                                    class="form-control input-md"
                                    wire:model="name"
                                />
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Add Delivery
                                </button>
                            </div>
                        </div>
                    </form>
                    <form
                        class="form-horizontal"
                        wire:submit.prevent="addNewDelivery"
                    >
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                >Choose Delivery Name</label
                            >
                            <div class="col-md-4">
                                <select name="delivery_company" class="form-control" wire:model='company_id'>
                                    <option value="0">Select Company Name</option>
                                    @foreach ($delivery_companies as $delivery_company )
                                        <option value="{{ $delivery_company->id }}">{{ $delivery_company->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                >Choose City</label
                            >
                            <div class="col-md-4">
                                <select name="delivery_company" class="form-control" wire:model='state'>
                                    <option value="0">Select City Name</option>
                                    @foreach ($states as $state )
                                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                >Basic Cost</label
                            >
                            <div class="col-md-4">
                                <input
                                    type="text"
                                    placeholder="Basic Cost"
                                    class="form-control input-md"
                                    wire:model="basic_cost"
                                />
                                @error('basic_cost')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                >Waiting Time</label
                            >
                            <div class="col-md-4">
                                <input
                                    type="text"
                                    placeholder="Waiting Time"
                                    class="form-control input-md"
                                    wire:model="waiting_time"
                                />
                                @error('waiting_time')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Add New
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

 {{-- {{ route('admin.attributes') }} --}}
