@extends('admin.layout.master')

@section('title', 'Category Create Page')

@section('contact')
    <div class="contact ">
        <div class="table-container">
            <div class="title text-center text-capitalize">
                <h1 class="text-primary">Category Create Page</h1>
            </div>
            <div class="row">
                <div class="offset-1 col-2 ">
                    <a href="{{ route('admin#bookList') }}">
                        <button class="btn btn-outline-dark">
                            <i class="fa-solid fa-left-long me-2"></i>Back
                        </button>
                    </a>
                </div>
            </div>
            <div class="row ">
                <div class="col-6 mt-3 mb-5 offset-3 shadow rounded p-5">
                    <form action="{{ route('admin#createBook') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <label class="form-label">Book Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Ender Book Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author" value="{{ old('author') }}"
                                class="form-control @error('author') is-invalid @enderror" placeholder="Ender Author Name">
                            @error('author')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Category Name</label>
                            <select name="categoryId" class="form-control @error('categoryName') is-invalid @enderror">
                                <option value="">Choose Category</option>
                                @foreach ($category as $c )
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('categoryName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="Ender Book's Description">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Book Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Download Link</label>
                            <input type="text" name="downloadLink" value="{{ old('downloadLink') }}"
                                class="form-control @error('downloadLink') is-invalid @enderror" placeholder="Ender Download Link">
                            @error('downloadLink')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary col-4 p-2" type="submit">
                                <i class="fa-solid fa-square-plus text-dark me-2"></i> Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
