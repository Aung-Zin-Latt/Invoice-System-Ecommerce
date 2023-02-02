<div>
    <!-- Navbar -->
    <x-navbar.navbar />
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- Sidebar -->
      <x-sidebar.sidebar />
      <div class="main-panel">
        <div class="content-wrapper">
            <style>
                nav svg {
                    height: 20px;
                }

                nav .hidden {
                    display: block !important;
                }
            </style>
            <div class="container" style="padding: 30px 0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading mb-5">
                                <div class="row">
                                    <div class="col-md-4">All Delivery Companies</div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Search...." wire:model="search">
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('add-company') }}" class="btn btn-primary text-white float-end">Add Company</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Company Id</th>
                                            <th>Company Name</th>
                                            <th>Action<th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($all_company_types as $company_type)
                                            <tr>
                                                <td>{{ $company_type->id }}</td>
                                                <td>{{ $company_type->name }}</td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="#" wire:click.prevent="destroy({{ $company_type->id }})" class="btn btn-danger text-white btn-sm">Delete</a>
                                                    <a href="{{ route('edit-company', ['company_type_id' => $company_type->id]) }}" class="btn btn-primary text-white btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                {{ $all_company_types->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>
    <x-sidebar.footer />
</div>
