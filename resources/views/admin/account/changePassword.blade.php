@extends('admin.layout.master')

@section('title', 'Password Change Page')

@section('contact')
    <div class="contact ">
        <div class="container">
            <div class="title text-center my-5">
                <h1>Password Change Page</h1>
            </div>
            <div class="row">
                <div class="col-6 offset-3 shadow p-5 bg-light rounded">
                    <form action="{{ route('admin#changePassword') }}" method="post">
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
