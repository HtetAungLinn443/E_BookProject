@extends('user.layout.master')

@section('title', 'Profile')

@section('content')
    <div class="contact ">
        <div class="table-container">
            <div class="title mt-5 text-center ">
                <h1 class="text-primary">Profile </h1>
            </div>
            @if (session('updateSuccess'))
                <div class="col-4 offset-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-xmark"></i> {{ session('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="row mt-5">
                <div class="col-lg-5  col-md-6 col-sm-6">
                    @if (Auth::user()->image == null)
                        @if (Auth::user()->gender == 'male')
                            <img src="{{ asset('storage/image/male_user_default.jpg') }}"
                                class="rounded shadow img-thumbnail col-10 offset-1">
                        @else
                            <img src="{{ asset('storage/image/female_default_user.png') }}"
                                class="rounded shadow img-thumbnail col-10 offset-1">
                        @endif
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                            class="rounded shadow img-thumbnail col-10 offset-1" />
                    @endif
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="shadow px-5 py-3 rounded">
                        <div class="row my-3">
                            <span class="col-sm-5 col-md-3"><i class="fa-solid fa-user text-primary me-2"></i> Name</span>

                            <span class="col text-capitalize">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-sm-5 col-md-3"><i
                                    class="fa-solid fa-envelope text-primary me-2"></i>Email</span>

                            <span class="col">{{ Auth::user()->email }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-sm-5 col-md-3"> <i
                                    class="fa-solid fa-mobile-screen-button text-primary me-2"></i>Phone</span>

                            <span class="col">{{ Auth::user()->phone }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-sm-5 col-md-3"><i
                                    class="fa-solid fa-location-dot text-primary me-2"></i>Address</span>

                            <span class="col text-capitalize">{{ Auth::user()->address }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-sm-5 col-md-3 "><i
                                    class="fa-solid fa-venus-mars text-primary me-2"></i>Gender</span>

                            <span class="col text-capitalize">
                                @if (Auth::user()->gender == 'male')
                                    <i class="fa-solid fa-mars text-primary me-2"></i>
                                @else
                                    <i class="fa-solid fa-venus text-danger me-2"></i>
                                @endif
                                {{ Auth::user()->gender }}
                            </span>
                        </div>

                        <div class="row my-5">
                            <a href="{{ route('user#editProfile', Auth::user()->id) }}">
                                <button class="btn btn-warning col-5">Edit Profile</button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
