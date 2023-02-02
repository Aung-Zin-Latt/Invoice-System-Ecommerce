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
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-4">All Delivery</div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Search...." wire:model="search">
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('add-delivery') }}" class="btn btn-primary text-white">Add Delivery</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Delivery Cost</th>
                                            <th>Delivery State<th>
                                            <th>Delivery Company</th>
                                            <th>Action<th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($allDeliveries as $allDelivery)
                                            <tr>
                                                <td>{{ $allDelivery->basic_cost }}</td>
                                                <td>{{ $allDelivery->state }}</td>
                                                {{-- <td>{{ $allDelivery->company_type }}</td> --}}
                                                <td></td>
                                                <td></td>
                                                {{-- <td>{{ $allDelivery->company_type->name }}</td> --}}
                                                <td>
                                                    <a href="#" class="btn btn-danger text-white btn-sm">Delete</a> {{-- {{ route('user.orderdetails', ['order_id' => $allDelivery->id]) }} --}}
                                                    <a href="{{ route('edit-delivery', ['delivery_id' => $allDelivery->id]) }}" class="btn btn-primary text-white btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                {{ $allDeliveries->links() }}
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
