@extends('layout.master')

@section('title', 'Register Page')

@section('content')

    <div class="box login">
        <div class="form">
            <div class="logo d-flex justify-content-center align-items-center mt-4 ">
                <h1 class="title text-white ">Sign In</h1>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="loginForm text-white mx-5 ">

                    <div class="mt-3">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control inputForm "
                            placeholder="Email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control inputForm" placeholder="Ender Password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <a href="{{ url('registerPage') }}" class="text-decoration-none">
                            Do You Have Account?
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-5">
                        <button type="submit" class="btn btn-info w-50">
                            Sign In
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
