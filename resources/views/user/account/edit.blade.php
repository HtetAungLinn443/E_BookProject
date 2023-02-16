@extends('user.layout.master')

@section('title', 'Profile Edit Page')

@section('content')
    <div class="contact ">
        <div class="table-container">
            <div class="title text-center my-5">
                <h1 class="text-warning ">Profile Update Page</h1>
            </div>
            <form action="{{ route('user#updateProfile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5">
                    <div class="col-lg-5 col-md-12">
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
                            <div class="col-6 offset-3 my-3">
                                <label class="form-label">Name</label>
                                <input type="text" placeholder="Ender Your Name" name="name"
                                    value="{{ old('name', Auth::user()->name) }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <label class="form-label">Email</label>
                                <input type="email" placeholder="Ender Your Email" name="email"
                                    value="{{ old('email', Auth::user()->email) }}"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <label class="form-label">Phone</label>
                                <input type="number" placeholder="Ender Your Phone Number" name="phone"
                                    value="{{ old('phone', Auth::user()->phone) }}"
                                    class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" id=""
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <small class="text-danger ">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" placeholder="Ender Your Address" class="form-control @error('address') is-invalid @enderror"
                                    cols="30" rows="7">{{ old('address', Auth::user()->address) }}</textarea>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Choose Gender</option>
                                    <option value="male" @if (Auth::user()->gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if (Auth::user()->gender == 'female') selected @endif>Female</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger"
                                        @if (Auth::user()->gender == 'female') selected @endif>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 mt-5 mb-3">
                                <button class="btn btn-primary offset-4 col-4" type="submit"><i
                                        class="fa-solid fa-floppy-disk me-2"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
