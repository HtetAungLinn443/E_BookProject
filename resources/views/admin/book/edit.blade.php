@extends('admin.layout.master')

@section('title', 'Profile Edit Page')

@section('contact')
    <div class="contact ">
        <div class="table-container">
            <div class="title text-center ">
                <h1 class="text-primary ">Book Update Page</h1>
            </div>
            <div class="ms-5">
                <a href="{{ route('admin#bookList') }}">
                    <button class="btn btn-outline-dark">
                        <i class="fa-solid fa-left-long me-2"></i>Back
                    </button>
                </a>
            </div>
            <form action="{{ route('admin#updateBook') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5 pb-5">
                    <div class="col-5">
                        <img src="{{ asset('storage/' . $data->image) }}"
                            class="rounded shadow img-thumbnail col-10 offset-1" />

                        <input type="file" name="image" id=""
                            class="form-control offset-1 w-75 mt-5 @error('image') is-invalid @enderror">
                        @error('image')
                            <small class="text-danger offset-1">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-7 ">

                        <input type="hidden" name="bookId" value="{{ $data->id }}">

                        <div class="shadow px-5 py-3 rounded">
                            <div class="col-6 offset-3 my-3">
                                <label for="" class="form-label">Book Name</label>
                                <input type="text" name="name" value="{{ old('name', $data->name) }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Ender Book Name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <label for="" class="form-label">Author Name</label>
                                <input type="text" name="author" value="{{ old('author', $data->author) }}"
                                    class="form-control @error('author') is-invalid @enderror"
                                    placeholder="Ender Author Name">
                                @error('author')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <label for="" class="form-label">Category Name</label>
                                <select name="categoryId" class="form-control @error('categoryId') is-invalid @enderror">
                                    <option value="">Choose Category</option>
                                    @foreach ($category as $c)
                                        <option value="{{ $c->id }}"
                                            @if ($data->category_id == $c->id) selected @endif>{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @error('categoryId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 offset-3 my-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30"
                                    rows="10" placeholder="Ender Description">{{ old('description', $data->description) }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-6 offset-3 my-3">
                                <label for="" class="form-label">Download Link</label>
                                <input type="text" name="downloadLink" value="{{ old('downloadLink', $data->link) }}"
                                    class="form-control @error('downloadLink') is-invalid @enderror"
                                    placeholder="Ender Download Link">
                                @error('downloadLink')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-12 mt-5 mb-3">
                                <button class="btn btn-primary offset-4 col-4" type="submit"><i
                                        class="fa-solid fa-floppy-disk me-2"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
