@extends('admin.layout.master')

@section('title', 'Category Edit Page')

@section('contact')
<div class="contact ">
    <div class="table-container">
        <div class="title text-center text-capitalize">
            <h1 class="text-primary">Category Edit Page</h1>
        </div>
        <div class="row">
            <div class="offset-1 col-2 ">
                <a href="{{ route('admin#categoryList') }}">
                    <button class="btn btn-outline-dark">
                        <i class="fa-solid fa-left-long me-2"></i>Back
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 shadow rounded p-5">
                <form action="{{ route('admin#categoryEdit',$data->id) }}" method="post">
                    @csrf

                    <div class="">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" value="{{ old('name',$data->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ender Category Name">
                        @error('name')
                            <div class="">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                        @enderror
                        <input type="hidden" name="categoryId" value="{{ $data->id }}">
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary col-4 p-2" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i> Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
