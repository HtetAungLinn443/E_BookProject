@extends('admin.layout.master')

@section('title', 'User List Page')

@section('contact')
    <div class="contact ">
        <div class="table-container">
            <div class="title text-center text-capitalize">
                <h1 class="text-primary">User List</h1>
            </div>
            <div class="row mt-5">
                <div class="col-1">
                    <div class="bg-info rounded text-center p-2 h5 text-white">
                        Admin - {{ $data->count() }}
                    </div>
                </div>
                @if (session('deleteSuccess'))
                    <div class="col-3 offset-8">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-circle-xmark"></i> {{ session('deleteSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Table Start -->
            @if (count($data) != 0)
                <table class="table mt-5 shadow rounded">
                    <thead>
                        <tr class="table-info">
                            <th class="col-2 text-center">Image</th>
                            <th class="col text-center">Name</th>
                            <th class="col text-center">Email</th>
                            <th class="col text-center">Phone</th>
                            <th class="col text-center">Addrress</th>
                            <th class="col text-center">Gender</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr class="table-data">
                                <td class="text-center ">
                                    @if ($d->image == null)
                                        @if ($d->gender == 'male')
                                            <img src="{{ asset('storage/image/male_user_default.jpg') }}"
                                                class="img-thumbnail col-4 shadow-sm">
                                        @else
                                            <img src="{{ asset('storage/image/female_default_user.png') }}"
                                                class="img-thumbnail col-4 shadow-sm">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . $d->image) }}" class="img-thumbnail col-4 shadow-sm"
                                            style="height: 80px" />
                                    @endif
                                </td>
                                <td class="text-center py-4">{{ $d->name }}</td>
                                <td class="text-center py-4">{{ $d->email }}</td>
                                <td class="text-center py-4">{{ $d->phone }}</td>
                                <input type="hidden" id="userId" value="{{ $d->id }}">
                                <td class="text-center py-4">{{ $d->address }}</td>
                                <td class="text-center py-4">{{ $d->gender }}</td>
                                <td class="py-4 text-center row">
                                    <select name="" class="form-control col me-3 roleChange" id="">
                                        <option value="admin" @if ($d->role == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="user" @if ($d->role == 'user') selected @endif>User
                                        </option>
                                    </select>
                                    <a href="{{ route('admin#delete', $d->id) }}" class="col text-center me-3"
                                        title="Delete"><i class="fa-solid fa-trash me-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="mt-5">
                    <h2 class="text-secondary text-center">There is no Users Here!</h2>
                    <h1 class="text-center mt-5 text-danger" style="font-size: 100px"> <i
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

@section('script')
    <script>
        $(document).ready(function() {
            // role change
            $('.roleChange').change(function() {
                $role = $(this).val();
                $parentNode = $(this).parents('tr');
                $userId = $parentNode.find('#userId').val();

                $data = {
                    'userId': $userId,
                    'role': $role,
                }

                $.ajax({
                    type: 'get',
                    url: '/account/role/change',
                    data: $data,
                    dataType: 'json'
                })
                location.reload();
            })
        })
    </script>
@endsection
