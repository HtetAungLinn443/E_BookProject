@extends('admin.layout.master')

@section('title', 'Profile')

@section('contact')
    <div class="contact ">
        <div class="table-container">
            <div class="title text-center ">
                <h1 class="text-primary">Book Details </h1>
            </div>
            <div class="ms-5">
                <a href="{{ route('admin#bookList') }}">
                    <button class="btn btn-outline-dark">
                        <i class="fa-solid fa-left-long me-2"></i>Back
                    </button>
                </a>
            </div>
            <div class="row mt-5">
                <div class="col-5">
                    <img src="{{ asset('storage/' . $data->image) }}" class="rounded shadow img-thumbnail col-10 offset-1"
                        alt="Book">
                </div>
                <div class="col-7 ">
                    <div class="shadow px-5 py-3 rounded">
                        <div class="row my-3">
                            <span class="col-3">Name</span>
                            <span class="col-1">:</span>
                            <span class="col text-capitalize">{{ $data->name }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-3">Author Name</span>
                            <span class="col-1">:</span>
                            <span class="col text-capitalize">{{ $data->author }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-3">Category</span>
                            <span class="col-1">:</span>
                            <span class="col text-capitalize">{{ $data->category_name }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-3">Download Count</span>
                            <span class="col-1">:</span>
                            <span class="col text-capitalize">{{ $data->download_count }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-3">Description</span>
                            <span class="col-1">:</span>
                            <span class="col-7 text-capitalize">{{ $data->description }}</span>
                        </div>
                        <div class="row my-3">
                            <span class="col-3">Download</span>
                            <span class="col-1">:</span>
                            <a href="{{ $data->link }}" _blink class="btn btn-outline-dark col-4">
                                Download - {{ $data->name }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
