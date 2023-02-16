@extends('layout.master')

@section('title', 'Register Page')

@section('content')
    <div class="box register">
        <div class="form">
            <div class="logo d-flex justify-content-center align-items-center mt-4 ">
                <h1 class="title text-white ">Sign Up</h1>
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="loginForm text-white mx-5">
                    <div class="mt-3">
                        <label for="">Username</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control inputForm @error('name') is-invalid @enderror" placeholder="Ender Your Name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="mt-3">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control inputForm @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Phone</label>
                        <input type="number" name="phone" value="{{ old('phone') }}" class="form-control inputForm @error('phone') is-invalid @enderror"
                            placeholder="Ender Your Phone Number">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control inputForm @error('address') is-invalid @enderror"
                            placeholder="Ender Your Address">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Gender</label>
                        <select name="gender" class="form-control inputForm @error('gender') is-invalid @enderror">
                            <option value="" selected>Choose Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control inputForm @error('password') is-invalid @enderror" placeholder="Ender Password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control inputForm @error('password_confirmation') is-invalid @enderror"
                            placeholder="Ender Password Again">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <a href="{{ url('loginPage') }}" class="text-decoration-none">
                            Already Have Account?
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-5">
                        <button type="submit" class="btn btn-info w-50">
                            Sign Up
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
