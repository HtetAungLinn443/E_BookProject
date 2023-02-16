@extends('admin.layout.master')

@section('title', 'Profile Edit Page')

@section('contact')
    <div class="contact ">
        <div class="table-container">
            <div class="title text-center ">
                <h1 class="text-primary ">Profile Update Page</h1>
            </div>
            <form action="{{ route('admin#editProfile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5">
                    <div class="col-5">
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
                        <input type="file" name="image" id="" class="form-control offset-1 w-75 mt-5">
                        @error('image')
                            <small class="text-danger offset-1">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-7 ">
                        <div class="shadow px-5 py-3 rounded">
                            <div class="col-6 offset-3 my-3">
                                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                    class="form-control ">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                    class="form-control ">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <input type="number" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                                    class="form-control ">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <textarea name="address" class="form-control" cols="30" rows="7">{{ old('address', Auth::user()->address) }}</textarea>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <select name="gender" class="form-control">
                                    <option value="">Choose Gender</option>
                                    <option value="male" @if (Auth::user()->gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if (Auth::user()->gender == 'female') selected @endif>Female</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger"
                                        @if (Auth::user()->gender == 'female') selected @endif>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <input type="text" name="role" disabled value="{{ Auth::user()->role }}"
                                    class="form-control ">
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
