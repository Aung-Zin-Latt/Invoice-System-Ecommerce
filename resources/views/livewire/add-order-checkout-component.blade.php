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
                        <h3>Add Order
                            <a href="{{ route('orders') }}" class="btn btn-primary text-white float-end">All Orders</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="placeOrder"
                            onsubmit="$('#processing').show();"
                            enctype="multipart/form-data"
                            method="POST"
                        >
                        @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <h4>Billing Address</h4>
                                    <div class="row pt-3">
                                        <div class="form-group col-md-6">
                                            <label for="fname">First Name</label>
                                            <input wire:model="firstname" type="text" name="fname" class="form-control" placeholder="Enter Your First Name">
                                            @error('firstname')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lname">Last Name</label>
                                            <input wire:model="lastname" type="text" name="lname" class="form-control" placeholder="Enter Your Last Name">
                                            @error('lastname')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email Address: (Optional)</label>
                                            <input wire:model="email" type="text" name="email" class="form-control" placeholder="Enter Your Email">
                                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="mobile">Phone Number</label>
                                            <input wire:model="mobile" type="number" name="mobile" class="form-control" placeholder="11 digits format">
                                            @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="form-group col-md-6">
                                            <label for="line1">Line 1</label>
                                            <input wire:model="line1" type="text" name="line1" class="form-control" placeholder="Enter Your Line 1">
                                            @error('line1')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="line2">Line 2</label>
                                            <input wire:model="line2" type="text" name="line2" class="form-control" placeholder="Enter Your Line 2">
                                            @error('line2')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="form-group col-md-6">
                                            <label for="country">{{ __("Country") }}</label>
                                            <select wire:model="selectedCountry" class="form-select">
                                                <option value="" selected>Select Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @if (!is_null($selectedCountry))
                                            <div class="form-group col-md-6">
                                                <label for="city">{{ __("City") }}</label>
                                                <select wire:model="selectedCity" class="form-select">
                                                    <option value="" selected>Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        @if (!is_null($selectedCity))
                                            <div class="form-group col-md-6">
                                                <label for="township">{{ __("Township") }}</label>
                                                <select wire:model="selectedTownship" class="form-select">
                                                    <option value="" selected>Select Township</option>
                                                    @foreach($townships as $township)
                                                        <option value="{{ $township->id }}">
                                                            {{ $township->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        <div class="form-group col-md-6">
                                            <label for="zip-code">Postcode / ZIP: (Optional)</label>
                                            <input wire:model="zipcode" type="number" name="zip-code" class="form-control" value="" placeholder="Your postal code"/>
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="form-group col-md-6">
                                            <label for="ship_to_different">
                                                <input wire:model="ship_to_different" type="checkbox" name="different-add" id="different-add" value="1">
                                                <span>Ship to a different address?</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                @if ($ship_to_different)
                                    <div class="col-md-12">
                                        <h4>Shipping Address</h4>
                                        <div class="row pt-3">
                                            <div class="form-group col-md-6">
                                                <label for="s_fname">First Name</label>
                                                <input wire:model="s_firstname" type="text" name="s_fname" class="form-control" placeholder="Enter Your First Name">
                                                @error('s_firstname')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="s_lname">Last Name</label>
                                                <input wire:model="s_lastname" type="text" name="s_lname" class="form-control" placeholder="Enter Your Last Name">
                                                @error('s_lastname')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="form-group col-md-6">
                                                <label for="email">Email Address: (Optional)</label>
                                                <input wire:model="s_email" type="text" name="email" class="form-control" placeholder="Enter Your Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="s_mobile">Phone Number</label>
                                                <input wire:model="s_mobile" type="number" name="s_mobile" class="form-control" placeholder="11 digits format">
                                                @error('s_mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="form-group col-md-6">
                                                <label for="s_line1">Line 1</label>
                                                <input wire:model="s_line1" type="text" name="s_line1" class="form-control" placeholder="Enter Your Line 1">
                                                @error('s_line1')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="s_line2">Line 2</label>
                                                <input wire:model="s_line2" type="text" name="s_line2" class="form-control" placeholder="Enter Your Line 2">
                                                @error('s_line2')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="form-group col-md-6">
                                                <label for="country">{{ __("Country") }}</label>
                                                <select wire:model="s_selectedCountry" class="form-select">
                                                    <option value="" selected>Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @if (!is_null($s_selectedCountry))
                                                <div class="form-group col-md-6">
                                                    <label for="city">{{ __("City") }}</label>
                                                    <select wire:model="s_selectedCity" class="form-select">
                                                        <option value="" selected>Select City</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{ $city->id }}">
                                                                {{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                            @if (!is_null($s_selectedCity))
                                                <div class="form-group col-md-6">
                                                    <label for="township">{{ __("Township") }}</label>
                                                    <select wire:model="s_selectedTownship" class="form-select">
                                                        <option value="" selected>Select Township</option>
                                                        @foreach($townships as $township)
                                                            <option value="{{ $township->id }}">
                                                                {{ $township->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                            <div class="form-group col-md-6">
                                                <label for="s_zip-code">Postcode / ZIP: (Optional)</label>
                                                <input wire:model="s_zipcode" type="number" name="s_zip-code" class="form-control" value="" placeholder="Your postal code"/>
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="form-group col-md-6">
                                                <label for="ship_to_different">
                                                    <input wire:model="ship_to_different" type="checkbox" name="different-add" id="different-add" value="1">
                                                    <span>Ship to a different address?</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div> {{-- End Row --}}

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 mt-5" wire:ignore>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Please Sign Here </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <label class="" for="">Signature:</label>
                                                    <br/>
                                                    <div id="sig"></div>
                                                    <br/>
                                                    <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                                    <textarea id="signature64" name="signed" style="display: none"></textarea>
                                                </div>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                    @error('signed')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6 mt-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Choose Delivery Service </h5>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($delivery_companies as $delivery_company )
                                                    <p class="row-in-form fill-wife">
                                                        <label class="checkbox-field">
                                                            <input
                                                                name="different-add"
                                                                id="different-add"
                                                                value="{{ $delivery_company->id }}"
                                                                type="radio"
                                                                wire:model="delivery"
                                                            />
                                                            <span
                                                                >{{ $delivery_company->name }}</span
                                                            >
                                                        </label>
                                                    </p>
                                                @endforeach
                                                @if($delivery)
                                                    @if(empty($services))
                                                        <p class="text-danger">Services Does Not Reachable!</p>
                                                    @else
                                                        @foreach ($services as $service)
                                                            {{-- {{ dd($service) }} --}}
                                                            @if($delivery == '1')
                                                                <img src="{{ asset('assets/images/profile/royal.png') }}" alt="company_logo">
                                                            @elseif($delivery == '2')
                                                                <img src="{{ asset('assets/images/profile/ninjavan.jpg') }}" alt="company_logo">
                                                            @elseif ($delivery == '3')
                                                                <img src="{{ asset('assets/images/profile/potato.jpg') }}" alt="potato_logo">
                                                            @endif
                                                            <p>{{ $service->name }}</p>
                                                            <p>Cost {{ $service->basic_cost }}</p>
                                                            <p>Waiting Time {{ $service->waiting_time }}</p>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @error('delivery')
                                        <span class="text-danger">{{
                                            $message
                                        }}</span>
                                    @enderror
                                </div>
                            </div>



                            <div class="summary summary-checkout">
                                <div class="summary-item payment-method">
                                    <h4 class="title-box">Payment Method</h4>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input
                                                name="payment-method"
                                                id="payment-method-bank"
                                                value="cod"
                                                type="radio"
                                                wire:model="paymentmode"
                                                class="form-check-input"
                                                checked
                                            />

                                            <span class="payment-desc"
                                                >Cash On Delivery</span
                                            >
                                        </label>
                                        <label class="form-check-label">
                                            <input
                                                name="payment-method"
                                                id="payment-method-kpay"
                                                value="kpay"
                                                type="radio"
                                                wire:model="paymentmode"
                                                class="form-check-input"
                                            />
                                            <span class="payment-desc">Kpay</span>
                                        </label>
                                        <label class="form-check-label">
                                            <input
                                                name="payment-method"
                                                id="payment-method-wavepay"
                                                value="wavepay"
                                                type="radio"
                                                wire:model="paymentmode"
                                                class="form-check-input"
                                            />

                                            <span class="payment-desc">Wave pay</span>
                                        </label>
                                        @error('paymentmode')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if(Session::has('checkout'))
                                        <p class="summary-info grand-total">
                                            <span>Grand Total</span>
                                            <span class="grand-total-price"
                                                >MMK {{ Session::get('checkout')['subtotal'] }}</span
                                            >
                                            @if($services)
                                                @foreach ($services as $service )
                                            + MMK <span class="delivery_cost">{{ $service->basic_cost }}</span>
                                                @endforeach
                                            @endif
                                        </p>
                                    @else
                                        <input type="text" class="form-control" wire:model="total" placeholder="Enter amount...">
                                    @endif
                                    @if($errors->isEmpty())
                                        <div
                                            wire:ignore
                                            id="processing"
                                            style="
                                                font-size: 22px;
                                                margin-bottom: 20px;
                                                padding-left: 37px;
                                                color: green;
                                                display: none;
                                            "
                                            >
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                            <span>Processing.....</span>
                                        </div>
                                    @endif

                                    <button type="submit" id="placeholder" class="btn btn-primary">
                                        Place order now
                                    </button>
                                </div>
                                <div class="summary-item shipping-method">
                                    <h4 class="title-box f-title">Shipping method</h4>
                                    <p class="summary-info">
                                        <span class="title">Flat Rate</span>
                                    </p>
                                    <p class="summary-info">
                                        <span class="title">Fixed $0</span>
                                    </p>
                                </div>
                            </div>



                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <x-sidebar.footer />

</div>
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
    $('#placeholder').click(function(e){
        let value = $("#signature64").val();
        @this.set('signed', value);
    });
</script>
