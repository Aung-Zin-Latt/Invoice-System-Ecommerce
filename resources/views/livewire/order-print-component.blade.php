<div>
    <style>
        .container {
            width: 100%;
            margin: auto;
        }

        hr {
            font-size: 20px;
            font-weight: bold;
        }

        body {
            width: 80%;
            margin: 0.5in .1875in;
            background: #e8e8e8;
            align-content: center;
        }

        /* Avery 5960 labels */
        .label {
            width: 5.25in;
            height: 50%;
            padding: .125in 0.1875in;
            margin-right: .12in;
            /* the gutter */
            float: left;
            text-align: left;
            overflow: hidden;
            background: #fff;
            outline: 1px dotted #999;
        }

        .page-break {
            clear: left;
            display: block;
            page-break-after: always;
        }

        .panel-body {
            margin-top: 20px;
        }

        .br {
            margin-top: 4px;
        }

        p {
            color: black !important;
        }
    </style>
    <div class="container" style="padding: 30px 0">
        <div class="label">
            @foreach ($allOrders as $order)
                <div class="wrap-logo-top left-section">
                    {{-- {{ dd($users) }} --}}
                    {{-- @foreach ($users as $user ) --}}
                        <img src="{{ asset('assets/images/profile') }}/{{ $users->image }}" alt="">
                        <h3 style="font-weight: bold; color: black;">{{ $users->company_name }}</h3>
                    {{-- @endforeach --}}
                    <p> Name : {{ $order->firstname }} {{ $order->lastname }}<br></p>
                    <p>
                        Address : <br>
                        From - Hledan , Kamayut , Mahar Bawga street <br>
                    </p>
                    <p>
                        To - {{ $order->country->name }} , {{ $order->city->name }} ,
                        {{ $order->township->name }} , {{ $order->line1 }} ,
                        {{ $order->line2 }}<br></p>

                    <p> Mobile No : {{ $order->mobile }} </p>
                    <p> Product Name :
                        @foreach ($order_items as $order_item )
                            @if($order->id == $order_item->order_id)
                                {{ $order_item->product->name }},
                            @endif
                        @endforeach
                    </p>
                    <p> Selling Price :
                        @foreach ($order_items as $order_item )
                            @if($order->id == $order_item->order_id)
                            {{ $order_item->price }} MMK,
                            @endif
                        @endforeach
                    </p>
                    <p>Total Amount : {{ $order->total }}</p>
                    <p> Quantity :
                            @php
                                $totalQty=0;
                                foreach($order_items as $item){
                                    if($item->order_id === $order->id){
                                        $totalQty += $item->quantity;
                                    }
                                }
                                echo $totalQty;
                            @endphp
                    </p>
                    <p>User Sign: <img src="{{ $order->user_sign }}" width="150" alt=""></p>
                    <p>Delivery Company: {{ $order->delivery_company }}</p>
                    <p>Delivery Charge: {{ $order->delivery_charge }}</p>
                    <hr>
                </div>
            @endforeach
        </div>
        <div class="page-break"></div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>

@endpush
