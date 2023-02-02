<div>
    <x-navbar.navbar />

    <div class="container-fluid page-body-wrapper">
        <x-sidebar.sidebar />

        <div class="main-panel">
            <div class="content-wrapper">

                <div class="container" style="padding: 30px 0">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">Update Profile</div>
                            <div class="panel-body">
                                {{-- <div class="row"> --}}
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <form wire:submit.prevent="updateProfile" enctype="multipart/form-data">
                                        <div class="row">
                                        <div class="col-md-4">
                                            @if ($newimage)
                                                <img src="{{ $newimage->temporaryUrl() }}" alt="" width="100%">
                                            @elseif ($image)
                                                <img src="{{ asset('assets/images/profile') }}/{{ $user->profile->image }}" alt="" width="100%">
                                            @else
                                                <img src="{{ asset('assets/images/profile/default.png') }}" alt="" width="100%">
                                            @endif
                                            <input wire:model="newimage" type="file">
                                            @error('newimage')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-8">
                                            <p><b>Name: </b><input type="text" class="form-control" wire:model="name" /></p>
                                            <p><b>Email: </b> {{ $email }}</p>
                                            <p><b>Phone: </b><input type="text" class="form-control" wire:model="mobile" /></p>
                                            <hr />
                                            <p><b>Line1: </b><input type="text" class="form-control" wire:model="line1" /></p>
                                            <p><b>Line2: </b><input type="text" class="form-control" wire:model="line2" />
                                            </p>
                                            <p><b>City: </b><input type="text" class="form-control" wire:model="city" /></p>
                                            <p><b>Province: </b><input type="text" class="form-control" wire:model="province" /></p>
                                            <p><b>Country: </b><input type="text" class="form-control" wire:model="country" /></p>
                                            <p><b>Zip Code: </b><input type="text" class="form-control" wire:model="zipcode" /></p>
                                            <p><b>Company Name: </b><input type="text" class="form-control" wire:model="company_name" /></p>
                                            {{-- <p><b>Company Logo: </b><input type="file" class="form-control" wire:model="newimage" />
                                            @if($newimage)
                                                <img src="{{ $image->temporaryUrl() }}" width="120" />
                                            @else
                                                <img src="{{ asset('assets/images/profile') }}/{{ $image }}" alt="Profile Image" width="120" />
                                            @endif
                                            </p> --}}
                                            <button type="submit" class="btn btn-info pull-right">Update</button>
                                        </div>
                                    </div>
                                    </form>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <x-sidebar.footer />
</div>





