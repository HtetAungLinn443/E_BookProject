@extends('admin.layout.master')

@section('title', 'Account Page')

@section('contact')
    <div class="contact ">
        <div class="container">
            <div class="h1 text-center  mt-5"><i class="fas fa-cog fa-spin text-danger me-2"></i> Setting</div>
            <div class="row my-5">
                <div class="col-3 setting-box rounded py-3 bg-light shadow-sm d-flex flex-column align-items-center m-5">
                    <p class="h1 box-title pt-1 mb-2 text-danger"><i class="fa-solid fa-user"></i></p>
                    <p class="h4 text-center mb-4">Profile Edit</p>

                    <a href="{{ route('admin#profileEditpage') }}" class="w-50 btn mb-4 btn-primary ">
                        Button
                    </a>
                </div>
                <div class="col-3 setting-box rounded py-3 bg-light shadow-sm d-flex flex-column align-items-center m-5">
                    <p class="h1 box-title pt-1 mb-2 text-danger"><i class="fa-solid fa-lock"></i></p>
                    <p class="h4 text-center mb-4">Change Password</p>
                    <a href="{{ route('admin#changePasswordPage') }}" class="btn mb-4 btn-primary w-50">
                        Button
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
