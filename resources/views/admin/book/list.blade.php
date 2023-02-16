@extends('admin.layout.master')

@section('title', 'Category List Page')

@section('contact')
    <div class="contact ">
        <div class="table-container">
            <div class="title text-center text-capitalize">
                <h1 class="text-primary">Books List</h1>
            </div>
            @if (session('deleteSuccess'))
                <div class="col-4 offset-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check me-2"></i> {{ session('deleteSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('updateSuccess'))
                <div class="col-4 offset-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check me-2"></i> {{ session('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="offset-9 col-3 pe-5 ">
                    <form action="">
                        <div class="bg-white border d-flex  rounded">
                            <input type="text" name="key" value="{{ request('key') }}"
                                class="form-control border-light" placeholder="Search Box">
                            <button class="btn btn-light "><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-1">
                    <div class="bg-info rounded text-center p-2 h5 text-white">
                        Total - {{ $data->count() }}

                    </div>
                </div>
                <div class="col-2 offset-9 ">
                    <a href="{{ route('admin#bookCratePage') }}">
                        <button class="btn btn-primary p-3 shadow"> <i class="fa-solid fa-plus me-3"></i>Add Book </button>
                    </a>
                </div>
            </div>

            <!-- Table Start -->
            @if (count($data) != 0)
                <table class="table mt-5 shadow">
                    <thead>
                        <tr class="table-info">
                            <th class="col-2 text-center">Image</th>
                            <th class="col-2 text-center">Name</th>
                            <th class="col-2 text-center">Author Name</th>
                            <th class="col-2 text-center">Category</th>
                            <th class="col-1 text-center">View Count</th>
                            <th class="col-3 text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr class="">
                                <td class="text-center ">
                                    <img src="{{ asset('storage/' . $d->image) }}" class="img-thumbnail col-4 shadow-sm"
                                        alt="Book">
                                </td>
                                <td class="text-center py-4">{{ $d->name }}</td>
                                <td class="text-center py-4">{{ $d->author }}</td>
                                <td class="text-center py-4">{{ $d->category_name }}</td>
                                <td class="text-center py-4">{{ $d->download_count }}</td>
                                <td class="py-4 ps-5">
                                    <a href="{{ route('admin#detailBook', $d->id) }}"
                                        class="btn btn-sm btn-outline-dark me-4" title="View"><i
                                            class="fa-solid fa-eye me-2"></i></i>View</a>
                                    <a href="{{ route('admin#bookEditPage', $d->id) }}"
                                        class="btn btn-sm btn-outline-primary me-4" title="Edit"><i
                                            class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                                    <a href="{{ route('admin#deleteBook', $d->id) }}" class="btn btn-sm btn-outline-danger"
                                        title="Delete"><i class="fa-solid fa-trash me-2"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            @else
                <div class="mt-5">
                    <h2 class="text-secondary text-center">There is no Book Here!</h2>
                    <h1 class="text-center mt-5 text-secondary" style="font-size: 100px"> <i
                            class="fa-regular fa-hourglass"></i></h1>
                </div>
            @endif
            <!-- Table End -->
            <div class="">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
