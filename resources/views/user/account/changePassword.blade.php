@extends('user.layout.master')

@section('title', 'Password Change Page')

@section('content')
    <div class="contact ">
        <div class="container">
            <div class="title text-center my-5">
                <h1>Password Change Page</h1>
            </div>
            @if (session('successChange'))
                <div class="col-4 offset-7">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-xmark"></i> {{ session('successChange') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('notMatch'))
                <div class="col-4 offset-7">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-xmark"></i> {{ session('notMatch') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-6 offset-3 shadow p-5 rounded">
                    <form action="{{ route('user#changePassword') }}" method="post">
                        @csrf
                        <div class="my-3">
                            <label for="" class="form-label">Old Password</label>
                            <input type="password" name="oldPassword" class="form-control "
                                placeholder="Ender Your Old Password">
                            @error('oldPassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="my-3">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" name="newPassword" class="form-control "
                                placeholder="Ender Your New Password">
                            @error('newPassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="my-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmPassword" class="form-control "
                                placeholder="Ender Your Email">
                            @error('confirmPassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="text-center mt-5">
                            <button class="btn btn-primary w-50" type="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
