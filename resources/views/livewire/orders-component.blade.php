<div>
    <x-navbar.navbar />

    <div class="container-fluid page-body-wrapper">
        <!-- components:sidebar/sidebar.blade.php -->
        <!-- partial -->
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
                                    <div class="col-md-4">All Orders</div>
                                    <div class="col-md-4 my-3">
                                        <label for="">Select Date</label>
                                        <input type="date" id="start" class="form-control" name="trip-start"
                                        min="2018-01-01" wire:model='date'>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('orderprint',['date'=>$date]) }}" class="pull-right btn btn-primary float-end">Print Preview</a> {{-- {{ route('user.orderprint',['date'=>$date]) }} --}}
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 stretch-card">
                                        <div class="card">
                                        <div class="card-body">
                                            <p class="card-title">Recent Purchases</p>
                                            <div class="table-responsive">
                                            <table id="recent-purchases-listing" class="table">
                                                <thead>
                                                <tr>
                                                    <th>OrderId</th>
                                                    <th>Subtotal</th>
                                                    <th>Discount</th>
                                                    <th>Total</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Zipcode</th>
                                                    <th>Status</th>
                                                    <th>Order Date</th>
                                                    <th>Delivery Company</th>
                                                    <th>Delivery Charge</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($orders)
                                                @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->id }}</td>
                                                            <td>MMK{{ $order->subtotal }}</td>
                                                            <td>MMK{{ $order->discount }}</td>
                                                            <td>MMK{{ $order->total }}</td>
                                                            <td>{{ $order->firstname }}</td>
                                                            <td>{{ $order->lastname }}</td>
                                                            <td>{{ $order->mobile }}</td>
                                                            <td>{{ $order->email }}</td>
                                                            <td>{{ $order->zipcode }}</td>
                                                            <td>{{ $order->status }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_company }}</td>
                                                            <td>{{ $order->delivery_charge }}</td>
                                                            <td>
                                                                <a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}"
                                                                    class="btn btn-info btn-sm">Details</a>
                                                                <div class="dropdown" style="padding-top: 10px;">
                                                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                                                        data-toggle="dropdown">
                                                                        Status
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <a href="#"
                                                                                wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"
                                                                                wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"
                                                                                wire:click.prevent="store({{ $order->id}})">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"
                                                                                wire:click.prevent="destroy({{ $order->id}})">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <h1>Empty Order</h1>
                                                @endif
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <x-sidebar.footer />
</div>

