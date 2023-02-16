@extends('user.layout.master')

@section('title', 'Details Page')

@section('content')
    <div class="mx-5">
        <h1 class="text-center my-3 text-warning">Details</h1>
        <div class="ms-3">
            <a href="{{ route('user#home') }}">
                <button class="btn btn-sm btn-outline-warning">
                    <i class="fa-solid fa-left-long me-2"></i>Back
                </button>
            </a>
        </div>
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12">
                <img src="{{ asset('storage/' . $data->image) }}" class="rounded shadow img-thumbnail col-10 offset-1"
                    alt="Book">
            </div>
            <div class="col-lg-7 col-md-12 mt-5">
                <div class="shadow px-4 py-3 rounded">
                    <div class=" my-4">
                        <h5 class="">Name - </h5>
                        <span class=" text-warning text-capitalize">{{ $data->name }}</span>
                    </div>
                    <div class=" my-4">
                        <h5 class=" ">Author Name - </h5>
                        <span class=" text-warning text-capitalize">{{ $data->author }}</span>
                    </div>

                    <input type="hidden" id="bookId" value="{{ $data->id }}">

                    <div class=" my-4">
                        <h5 class=" ">Category - </h5>
                        <span class=" text-warning text-capitalize">{{ $data->category_name }}</span>
                    </div>
                    <div class=" my-4">
                        <h5 class=" ">Download Count - </h5>
                        <span class="fs-3 text-warning text-capitalize">{{ $data->download_count }}</span>
                    </div>
                    <div class=" my-4">
                        <h5 class=" ">Description - </h5>
                        <span class="  text-warning text-capitalize">{{ $data->description }}</span>
                    </div>
                    <div class=" my-4">
                        <h5 class=" ">Download</h5>
                        <a href="{{ $data->link }}" target="_blank" class="btn btn-outline-warning down_count">
                            Download - {{ $data->name }}
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.down_count').click(function() {
                $data = {
                    'bookId': $('#bookId').val(),
                };
                console.log($data);
                // increase download count
                $.ajax({
                    type: 'get',
                    url: '/user/download/count',
                    data: $data,
                    dataType: 'json',
                })
            })
        })
    </script>
@endsection
