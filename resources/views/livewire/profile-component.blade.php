<div>
    <x-navbar.navbar />

    <div class="container-fluid page-body-wrapper">
        <x-sidebar.sidebar />

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container" style="padding: 30px 0">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">Profile</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if($user->profile->image)
                                            {{-- <img src="{{ $userProfile->image }}" width="100%" /> --}}
                                            <img src="{{ asset('assets/images/profile') }}/{{ $user->profile->image }}" width="100%" />
                                        @else
                                        <img
                                            src="{{ asset('assets/images/profile/default.png') }}" width="100%" />
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <p><b>Name: </b> {{ $user->name }}</p>
                                        <p><b>Email: </b> {{ $user->email }}</p>
                                        <p><b>Phone: </b> {{ $user->profile->mobile }}</p>
                                        <hr />
                                        <p><b>Line1: </b> {{ $user->profile->line1 }}</p>
                                        <p><b>Line2: </b> {{ $user->profile->line2 }}</p>
                                        <p><b>City: </b> {{ $user->profile->city }}</p>
                                        <p><b>Province: </b> {{ $user->profile->province }}</p>
                                        <p><b>Country: </b> {{ $user->profile->country }}</p>
                                        <p><b>Zip Code: </b> {{ $user->profile->zipcode }}</p>
                                        <a href="{{ route('edit-profile') }}" class="btn btn-info pull-right">Update Profile</a>
                                        {{-- ['profile_id' => $user->profile->id] --}}
                                    </div>
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





